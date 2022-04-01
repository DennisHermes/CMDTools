<!DOCTYPE html>
<html lang="en">

	<head>
	
		<style>
            body {
                width: 100%;
                margin: 0;
            }

            .content {
                float: left;
                width: 40vw;
                background: red;
                height: 100vh;
                position: relative;
                color: white;
                z-index: -10;
            }

            .content:after {
                content: '';
                position: absolute;
                right: -40px;
                border-top: 100vh solid green;
                border-right: 40px solid transparent;
            }

            .inner {
                float: left;
                position: absolute;
                z-index: 10;
            }
        </style>

	</head>

	<body>

        <div class="content"></div>

		<div class="inner">
			<form action="fileReader.php" method="post" enctype="multipart/form-data">
				<label for="file-upload" class="custom-file-upload">
					<i class="fa fa-cloud-upload"></i> Select resource pack
				</label>
				<br><br>
				<p style="text-align: center; color: black; font-size: 15px;">(has to be .zip file)</p>
				<br><br>
				<p id="filename" style="text-align: center; color: black; font-size: 12px;">No file selected</p>
				<input onchange="document.getElementById('filename').innerHTML = document.getElementById('file-upload').files.item(0).name;" id="file-upload" name='file' type="file"/>
				<br><br>
				<input type="submit" value="Look up">
			</form>
		</div>

	</body>

</html>