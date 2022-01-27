<template>
	<div id="sobre-info" class="info">
		<p class="titulo">Sobre &nbsp;<i class="fas fa-book"></i></p>
		<p class="texto-principal">{{RegiaoDesc}}</p>
		<p class="titulo-secundario">Principais Pontos Turísticos</p>

		<div class="row mx-2">
			<div class="card col-sm-8 col-md-10 col-lg-8" v-for="ponto in Pontos" :key='Pontos.id'>
				<img class="card-img-top" :src="'img/'+RegiaoNome+'/locais/'+ponto.img">
				<div class="card-body">
					<p class="card-title">{{ponto.nome}}</p>
				</div>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default {
		name: "Sobre",
		props: {
			RegiaoDesc: String,
			RegiaoNome: String,
			Pontos: {}
		},
		data () {
			return {
				
			}
		}
	}
</script>