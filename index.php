<?php 
	include 'shared/navigator.php'; 
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		
		<title>CMDTools</title>

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
						<button onclick="window.location.href = 'plugins';" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out" style="color: #3d3d3d">Create new items <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
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
						<a class="text-gray-600 mb-8" href="guides" style="color: #007bee; font-size: 20px;"><u>More on what CMD is? ></u></a>
					</div>
					<div class="w-full sm:w-1/2 p-6">
						<img src="media/about.svg">
					</div>
				</div>

				<br><br><br><br><br><br><br>

				<h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800" style="color: #3d3d3d">What can you do?</h1>
				<div class="w-full mb-4">
				  <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
				</div>

				<br><br>

				<div class="flex flex-wrap">
					<div class="w-5/6 sm:w-2/3 p-6">
						<h3 class="text-3xl text-gray-800 font-bold leading-none mb-3" style="color: #3d3d3d">Create with CMDTools</h3>
						<p class="text-gray-600 mb-8" style="color: #3d3d3d">With CMDTools you can super easily add a whole new set of features to your Minecraft server. You can add pretty much anything you can think of to your server without having to use plugins or mods. You can add new items without overwriting others, add new blocks, add new mobs and animals also without overwriting others and add new chat characters to add smileys for example.</p>
						<a class="text-gray-600 mb-8" href="create" style="color: #007bee; font-size: 20px;"><u>Start creating your perfect server ></u></a>
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
						<h3 class="text-3xl text-gray-800 font-bold leading-none mb-3" style="color: #3d3d3d">View existing CMD packs</h3>
						<p class="text-gray-600 mb-8" style="color: #3d3d3d">With CMDTools you can also open existing CMD packs to see if your CMD pack was created correctly or if you are unsure if you added an item. You can also check what the CMD values, entity names and character codes were after creating a CMD pack. You can also view other people's CMD packs to copy textures for your own projects.</p>
						<a class="text-gray-600 mb-8" href="view" style="color: #007bee; font-size: 20px;"><u>Open a CMD pack ></u></a>
					</div>
				</div>
			</div>
		</section>
	</body>

	<footer>
    <br>
        <div class="div1">
            sssssssssssssssssssssssssssssssssssssssssssssssssssssssss
            sssssssssssssssssssssssssssssssssssssssssssssssssssssssss
            sssssssssssssssssssssssssssssssssssssssssssssssssssssssss
            sssssssssssssssssssssssssssssssssssssssssssssssssssssssss
        </div>
        <div class="div2">
            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
        </div>
        <br><br><br>
        <p>© CMDTools</p>
    </footer>

</html>