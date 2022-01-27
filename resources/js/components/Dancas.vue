<template>
	<div id="dancas-info" class="info">
		<p class="titulo">Danças &nbsp;<i class="fas fa-drum"></i></p>

		<div class="row mx-2">
			<div class="card col-sm-7 col-md-9 col-lg-8" v-for="danca in Dancas" :key='Dancas.id'>
				<img class="card-img-top" :src="'img/'+RegiaoNome+'/dancas/'+danca.img">
				<div class="card-body">
					<p class="card-title">{{danca.nome}}</p>
				</div>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default {
		name: "Dancas",
		props: {
			RegiaoNome: String,
			Dancas: {}
		},
		data () {
			return {
				
			}
		}
	}
</script>