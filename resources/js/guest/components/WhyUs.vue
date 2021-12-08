<template>
	<section id="WhyUs">
		<img class="triangle-yellow" src="../../../media/images/xk-scegliere-top.png">
		<div class="color-bg">
			<div class="title-box">
			<h2>perché sceglierci?</h2>
			<p>
				Perchè da noi non serve iscriversi per ricevere subito il tuo piatto,
				puoi farlo in pochissimi passaggi!			
			</p>
		</div>

		<div class="container-m">
			<div class="box-left">
				<h2 >1.Cerca</h2>
				<p>Cerca un ristorante per categoria, nome o estrailo casualmente.</p>
				<h2 >2.Ordina</h2>
				<p>Scegli dal menù del ristorante, inserisci il tuo indirizzo, e il tuo pranzo inizierà a correre verso di te.</p>
				<h2>3.Ritira</h2>
				<p>Allunga il braccio fuori dalla finestra e prendi al volo ciò che hai ordinato.</p>
			</div>

			<div class="box-right">
			<div class="vertical-text">
				in pochi minuti!
			</div>
			<div class="box-hand-img">
				<img class="hand-image" src="../../../media/images/smartphone-yaah.png">
			</div>
			</div>
		</div>
	</div>
		<img class="triangle-yellow" src="../../../media/images/xk-scegliere-bottom.png">
	</section>
</template>

<script>
export default {
	name: 'WhyUs'
}
</script>

<style lang="scss" scoped>

@import '../../../sass/_variables.scss';

#WhyUs {
    display: flex;
    flex-direction: column;
	margin: 120px 0;
    .triangle-yellow {
		width: 100%;
    }
    .color-bg {
		background-color: $c-04;

    .title-box {
		text-align: center;
		margin-bottom: 4rem;
		padding-top: 4rem;
		
		h2 {
        @include sans-extrabold-i;
        font-size: 3.4375rem;
        text-transform: uppercase;
        color: $c-05;
		}
		p {
			color: $text-light-white;
			max-width: 41.25rem;
			margin: 0 auto;
			font-size: 1.375rem;
		}
    }
		.container-m {
			display: flex;
			.box-left {
				width: 50%;

				h2 {
					@include sans-extrabold-i;
					font-size: 2.8125rem;
					color: $c-05;
				}
				p {
					color: $text-light-white;
					max-width: 26.5625rem;
					margin-bottom: 3rem;
					font-size: 1.375rem;
				}
			}
			.box-right{
				color: $text-light-white;
				// border: 2px solid #fff;
				width: 50%;
				position: relative;
			
				.box-hand-img {
					position: absolute;
					overflow: hidden;
					height: 600px;
					width: 50%;
					bottom: 0;
					right: -20px;

					.hand-image {
						height: 145%;
						position: absolute;
						top: 50%;
						left: 50%;
						transform: translate(-50% , -50%);
					}
				}
				.vertical-text{
					@include sans-extrabold-i;
					font-family: "Sarabun", sans-serif;
					font-weight: 800;
					font-style: italic;
					font-size: 4.25rem;
					text-transform: uppercase;
					transform: rotate(-90deg) translate(50%);
					position: absolute;
					right: -290px;
					bottom: 0;
				}
			}
		}
    }
}
</style>