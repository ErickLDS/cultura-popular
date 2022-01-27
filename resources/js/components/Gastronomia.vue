<template>
	<div id="gastronomia-info" class="info">
		<p class="titulo">Gastronomia &nbsp;<i class="fas fa-utensils"></i></p>

		<div class="row mx-2">
			<div class="card col-sm-7 col-md-9 col-lg-8" v-for="comida in Comidas" :key='Comidas.id'>
				<img class="card-img-top" :src="'img/'+RegiaoNome+'/comidas/'+comida.img">
				<div class="card-body">
					<p class="card-title">{{comida.nome}}</p>
				</div>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default {
		name: "Gastronomia",
		props: {
			RegiaoNome: String,
			Comidas: {}
		},
		data () {
			return {
				
			}
		}
	}
</script>