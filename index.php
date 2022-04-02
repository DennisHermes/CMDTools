<?php include 'navigator.php'; ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link href="https://fonts.googleapis.com/css2?family=Hubballi&family=Oxygen:wght@300&family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="css/index.css" />
		<link rel="stylesheet" href="css/tailwind.min.css" />

	</head>

	<body class="leading-normal tracking-normal text-white gradient">

		<section id="header">
			<div class="pt-24">
				<div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">

					<div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
						<h1 class="my-4 text-5xl font-bold leading-tight" style="color: smokewhite">CMDTools</h1>
						<p class="leading-normal text-2xl mb-8" style="color: smokewhite">With CMDTools you can add items to your server without overwriting any other ones!</p>
						<button class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out" style="color: #3d3d3d"><i class="fa fa-download"></i> Create new items</button>
					</div>
					<div class="w-full md:w-3/5 py-6 text-center">
						<img style="float: right;" class="w-full md:w-4/5 z-50" src="media/hero.svg">
					</div>

				</div>
			</div>
			<div class="relative -mt-12 lg:-mt-24">
				<img src="media/lines.svg">
			</div>
		</section>


		<section id="body" class="bg-white border-b py-8">
			<div class="container max-w-5xl mx-auto m-8">

				<h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800" style="color: #3d3d3d">CMDTools</h1>
				<div class="w-full mb-4">
				  <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
				</div>

				<br>

				<div class="flex flex-wrap">
					<div class="w-full sm:w-1/2 p-6">
						<h3 class="text-3xl text-gray-800 font-bold leading-none mb-3" style="color: #3d3d3d">What is CMD?</h3>
						<p class="text-gray-600 mb-8" style="color: #3d3d3d">As of version 1.16, Minecraft has added Custom Model Data (CMD). CMD assigns a model to items with that specific NBT data. It does not overwrite the original item, and can still have durability. So it adds a whole new item to your server without overwriting any other! This can therefore be used in any situation and opens up new possibilities. <br><br> What does CMDTools add? We think this feature has really great potential but it is not really accessible for everyone yet, you need to know quite a bit about programming and creating texture packs to be able to do this. CMDTools makes this as easy as possible in the hope that more people will use it and make really cool things with it.</p>
						<a class="text-gray-600 mb-8" href="cmdexplained" style="color: #007bee; font-size: 20px;"><u>More on what CMD is? ></u></a>
					</div>
					<div class="w-full sm:w-1/2 p-6">
						<img src="media/about.svg">
					</div>
				</div>

				<br><br><br><br><br><br><br><br><br><br>

				<div class="flex flex-wrap">
					<div class="w-5/6 sm:w-2/3 p-6">
						<h3 class="text-3xl text-gray-800 font-bold leading-none mb-3" style="color: #3d3d3d">A super simple way to increase your profits</h3>
						<p class="text-gray-600 mb-8" style="color: #3d3d3d">As a server owner, it is often difficult to really get started because you don't really have players who want to spend money on your server yet, but you do have the financial responsibility. AdRewards tries to lighten this phase so that more servers really get a chance to develop. And all this while you do not take anything away from your community but you can reward them.</p>
					</div>
					<div class="w-full sm:w-1/3 p-6">
						<img src="media/create.svg">
					</div>
				</div>

				<br><br>

				<div class="flex flex-wrap">
					<div class="w-full sm:w-1/3 p-6">
						<img src="media/read.svg">
					</div>
					<div class="w-full sm:w-2/3 p-6">
						<div class="align-middle">
						<h3 class="text-3xl text-gray-800 font-bold leading-none mb-3" style="color: #3d3d3d">AdRewards is still in development</h3>
						<p class="text-gray-600 mb-8" style="color: #3d3d3d">We are still working daily to make the experience of both the community owner and the users as perfect as possible! This includes new features, new designs and improvements and better performance of plugin, site and the communication between them. We try to do this as much as possible behind the scenes so you can just serve ads all day long!</p>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>