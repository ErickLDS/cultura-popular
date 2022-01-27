<template>
	<form @submit.prevent='enviarForm' method="POST" enctype="multipart/form-data" class="col-sm-10 col-md-8 col-lg-6 mx-auto my-3">

		<!-- Tipo -->
		<div class="form-floating mb-3">
			<select @change='readContent' class="form-select" id="tipo" name='tipo' required v-model="form.tipo">
				<option value="FALSE" selected>Não Escolhido</option>
				<option value="pontos">Pontos</option>
				<option value="gastronomia">Gastronomia</option>
				<option value="dancas">Dancas</option>
				<option value="festas">Festas</option>
			</select>
			<label for="tipo">Escolha Um tipo</label>
		</div>

		<!-- Região -->
		<div class="form-floating mb-3">
			<select @change='readContent' class="form-select" id="regiao" name='regiao' required v-model="form.regiao">
				<option value="FALSE" selected>Não Escolhido</option>
				<option v-for="regioes in Regioes" :key='Regioes.id' :value="regioes.id">{{regioes.nome}}</option>
			</select>
			<label for="regiao">Escolha Uma Região</label>
		</div>

		<!-- Modificar -->
		<div class="form-floating mb-4">
			<select class="form-select" id="modificar" name='modificar' v-model="form.modificar">
				<option value="FALSE" selected>Não Quero Modificar</option>
				<option v-for="content in Content" :key="Content.id" :value="content.id">{{content.nome}}</option>
			</select>
			<label for="modificar">Modificar</label>
		</div>

		<!-- Imagem -->
		<input class="mb-3" type="file" name="imagem" id="imagem" required>

		<!-- Nome -->
		<div class="form-floating mb-3">
			<input type="text" class="form-control" id="nome" placeholder=" " v-model="form.nome" required>
			<label for="nome">Nome</label>
		</div>

		<button class="btn btn-primary w-100" type="submit">Enviar</button>
	</form>
</template>

<script type="text/javascript">
	export default {
		name: "FormAdd",
		data () {
			return {
				Regioes: null,
				Content: null,
				form: {
					tipo: null,
					regiao: null,
					modificar: null,
					img: null,
					nome: null
				}
			}
		},
		methods: {
			readContent () {
				if (document.querySelector("#tipo").value != "FALSE" && document.querySelector("#regiao").value != "FALSE") {

					var tipo = document.querySelector("#tipo").value;

					fetch('/admin/read', {
						method: "POST",
						body: JSON.stringify({"id": 7, "tipo": tipo}),
						headers: {
							"Content-type": "application/json; charset=UTF-8",
							'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
						}
					})
					.then(res => res.json())
					.then(json => this.Content = json);
				}
			},
			enviarForm (e) {
				this.form.img = document.querySelector("#imagem").value;

				fetch('/admin/add', {
					method: "POST",
					body: JSON.stringify(this.form),
					headers: {
						"Content-Type": "application/json",
						'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
					}
				})
				.then(res => res.json())
				.then(json => console.log(json));
			}
		},
		mounted () {
			fetch('/admin/readRegiao', {
				method: "POST",
				headers: {
					"Content-type": "application/json; charset=UTF-8",
					'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
				}
			})
			.then(res => res.json())
			.then(json => this.Regioes = json);
		}
	}
</script>