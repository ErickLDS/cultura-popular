<template>
<main id="container" class="">
	<div id="mapa">
		<div id="titulo-principal">
			<p>Escolha uma região:</p>
		</div>

		<MapaSvg @showInfo="showInfo" />
	</div>

	<div id="informacoes">
		<div id="cabecalho" class="d-flex flex-row">
			<i id="btn-fechar" @click='closeInfo' class="fas fa-arrow-left"></i>
			<p id="titulo-principal">{{RegiaoNome}}</p>

			<i @click='theme' id="btn-theme" class="fas fa-moon"></i>
		</div>

		<div id="info-conteudo">
			<div id="navegacao">
				<div id='navegacao-cont'>
					<div id="itens">
						<div id="marker"></div>
						<i @click='showItem' class="fas fa-book itens-content" id="sobre"></i>
						<i @click='showItem' class="fas fa-utensils itens-content" id="gastronomia"></i>
						<i @click='showItem' class="fas fa-drum itens-content" id="dancas"></i>
						<i @click='showItem' class="fas fa-theater-masks itens-content" id="festas"></i>
					</div>
				</div>

				<div id='conteudo'>
					<Sobre :RegiaoDesc="RegiaoDesc" :Pontos="Pontos" :RegiaoNome="RegiaoNome"/>
					<Gastronomia :Comidas="Comidas" :RegiaoNome="RegiaoNome"/>
					<Dancas :Dancas="Dancas" :RegiaoNome="RegiaoNome"/>
					<Festas :Festas="Festas" :RegiaoNome="RegiaoNome"/>
				</div>
			</div>
		</div>
	</div>
</main>
</template>

<script>
	import MapaSvg from "./components/MapaSvg.vue";
	import Sobre from "./components/Sobre.vue";
	import Gastronomia from "./components/Gastronomia.vue";
	import Dancas from "./components/Dancas.vue";
	import Festas from "./components/Festas.vue";

	export default {
		name: 'App',
		data () {
			return {
				RegiaoNome: "",
				RegiaoDesc: "",
				Pontos: null,
				Comidas: null,
				Dancas: null,
				Festas: null
			}
		},
		components: {
			MapaSvg,
			Sobre,
			Gastronomia,
			Dancas,
			Festas
		},
		methods: {
			getDados (nome) {
				// Fetch API
				fetch("/read", {
					method: "POST",
					body: JSON.stringify({"id": nome}),
					headers: {
						"Content-type": "application/json; charset=UTF-8",
						'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
					}
				})
				.then(res => res.json())
				.then(json => this.setDados(json));
			},
			setDados (dados) {
				// Set Dados
				this.RegiaoNome = dados.regioes.nome;
				this.RegiaoDesc = dados.regioes.desc;

				this.Pontos = dados.pontos;
				this.Comidas = dados.gastronomia;
				this.Dancas = dados.dancas;
				this.Festas = dados.festas;

				document.body.style.setProperty('--cor-principal', dados.regioes.cor);

				// Resetando items
				this.setItens(document.querySelector("#sobre"));
			},
			closeInfo () {
				// Desativando informações
				document.querySelector("#container").classList.remove("active");
				document.querySelector("#informacoes").classList.remove("active");
				document.querySelector("#itens").classList.remove("active");
			},
			showInfo (nome) {
				// Pegar Dados
				this.getDados(nome);

				// Ativando Info
				document.querySelector("#container").classList.add("active");
				document.querySelector("#informacoes").classList.add("active");
				document.querySelector("#itens").classList.add("active");
			},
			showItem (e) {
				// Set Item
				this.setItens(e.target);		
			},
			setItens (e) {
				// Pegando Cor Principal
				var cor = getComputedStyle(document.body).getPropertyValue("--cor-principal");
				var fundo = getComputedStyle(document.body).getPropertyValue("--fundo");

				// Ativando Item
				document.querySelectorAll(".info").forEach(function (element){
					element.classList.remove("active");
				});
				document.querySelector("#"+e.id+"-info").classList.add("active");


				document.querySelectorAll(".itens-content").forEach(function (element){
					element.classList.remove("active");
				});
				e.classList.add("active");

				// Resetando Itens
				document.querySelectorAll(".itens-content").forEach(function (element){
					element.style.color = cor;
				});

				// Definido cor
				e.style.color = fundo;

				// Set Marcador
				document.querySelector("#marker").style.height = getComputedStyle(e).getPropertyValue("height");
				document.querySelector("#marker").style.top = e.offsetTop+"px";
			},
			theme (e) {
				// Ativando
				e.target.classList.toggle('active');

				e.target.classList.toggle('fa-moon');
				e.target.classList.toggle('fa-sun');

				if (e.target.classList.contains("active")) {
					document.body.style.setProperty('--texto', "#fff");
					document.body.style.setProperty('--fundo', "#171D21");
					document.querySelector(".itens-content.active").style.color = '#171D21';
				} else {
					document.body.style.setProperty('--texto', "#171D21");
					document.body.style.setProperty('--fundo', "#fff");
					document.querySelector(".itens-content.active").style.color = '#fff';
				}
			}
		}
	}
</script>