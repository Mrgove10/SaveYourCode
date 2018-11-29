<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SaveYourCode EPSI/WIS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
        body {
        text-align: center;
    }
    
    textarea {
        width: 100%;
        float: top;
        min-height: 200px;
        overflow: scroll;
        margin: auto;
        display: inline-block;
        background: #f4f4f9;
        outline: none;
        font-family: Courier, sans-serif;
        font-size: 14px;
    }
    
    iframe {
        bottom: 0;
        position: relative;
        width: 100%;
        height: 35em;
    }
    </style>
</head>

<body id="body">
    <textarea id="html" placeholder="HTML"></textarea>
    <textarea id="css" placeholder="CSS" style="display: none !important;"></textarea>
    <textarea id="js" placeholder="JavaScript" style="display: none !important;"></textarea>
    <iframe id="code"></iframe>

    <div class="container-fluid" style="position:fixed;bottom:0px;width:100%;background-color:#d8d8d8;padding:1%;">
        <div class="row" style="margin:1px;">
            <a target="_blank" href="http://www.epsi.fr/campus/campus-de-grenoble/"><div class="col-md">
                <img src="Media/Logo EPSI.png" style="height:75px">
                <br>    
                EPSI Grenoble
            </div></a>
            <a target="_blank" href="http://www.wis-ecoles.com/campus/campus-de-grenoble/"><div class="col-md">
                <img src="Media/Logo WIS.jpg" style="height:75px">
                <br>    
                WIS Grenoble
            </div></a>
            <div class="col-md">
                Coded with ❤ by <a target="_blank" href="https://adrienrichard.com/">Adrien Richard</a> in Grenoble 🏔<br>
               <a href="#">🏠</a><br>
               I am OpenSource : <a target="_blank" href="https://github.com/Mrgove10/SaveYourCode">Github</a>!<br>
               <a href="Template/Complete.html">👩‍💻&👨‍💻</a><br>
            </div>
        </div>
    </div>
</body>

<footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script>
        function compile() {
            var html = document.getElementById("html");
            // var css = document.getElementById("css");
            // var js = document.getElementById("js");
            var code = document.getElementById("code").contentWindow.document;
            html.value = `<h1>Colle con code HTML ici ! :)</h1> `;
            document.body.onkeyup = function () {
                code.open();
                code.writeln(
                    html.value +
                    "<style>" +
                    css.value +
                    "</style>"
                );
                code.close();
            };
        }

        compile();

        function setValue() {
            document.mainForm.rawCode.value = document.getElementById("html").value;
            document.forms["mainForm"].submit();
            console.log("value sent");
        }
    </script>
</footer>

</html>