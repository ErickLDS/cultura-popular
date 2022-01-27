<template>
	<div id="festas-info" class="info">
		<p class="titulo">Festivais &nbsp;<i class="fas fa-theater-masks"></i></p>

		<div class="row mx-2">
			<div class="card col-sm-7 col-md-9 col-lg-8" v-for="festa in Festas" :key='Festas.id'>
				<img class="card-img-top" :src="'img/'+RegiaoNome+'/festas/'+festa.img">
				<div class="card-body">
					<p class="card-title">{{festa.nome}}</p>
				</div>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default {
		name: "Festas",
		props: {
			RegiaoNome: String,
			Festas: {}
		},
		data () {
			return {
				
			}
		}
	}
</script>