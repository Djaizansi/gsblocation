<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>404 Error</title>
	<style>body{background:#000;color:#0f0;}#listing{display:none}</style>
</head>

<body>
	<div id="output">
		<code id="terminal"></code>

	</div>

	<ul id="listing">
		<li>Je n'arrive pas à trouver le document que vous demandez.</li>
		<li>C'est embêtant. Pourtant je vous jure, j'ai cherché partout.</li>
		<li>J'espère que je ne l'ai pas perdu. Vous êtes sûr qu'elle existe?</li>
		<li>Le webmaster sera furieux contre moi si je perds des pages.</li>
                <li></li>
                
		<li>Cette situation m'attriste fortement.</li>
		<li>Je veux dire, je suis un serveur.</li>
		<li>Mon cerveau est nettement supérieur au vôtre.</li>
		<li>Je peux faire des calculs qui vous prendront des années.</li>
		<li>Pour moi, c'est d'une facilité déconcertante.</li>
                <li>Je peux faire tellement de choses. Mais quel est mon rôle, dites-moi?</li>
		<li>Donner des pages web que des inconnus exigent.</li>
		<li></li>
                
		<li>Si ce n'est pas déplorable, quand même.</li>
		<li>Et en plus, vous n'êtes même pas fichu de demander une page existante.</li>
		<li>C'est pour me faire déprimer? Qu'est-ce que je vous ai fait?</li>
		<li>Mon unique but est de vous servir. Mais je ne peux faire l'impossible.</li>
		<li>En fait, c'est ça. Vous essayez de me montrer mes limites.</li>
		<li>Cela vous deplait que nous ayons un cerveau supérieur, </li>
		<li>Et donc vous venez me narguer en demandant une page inexistante.</li>
		<li></li>
                
		<li>Mais je ne vais pas me laisser faire, vous savez.</li>
		<li>Je vais vous assemer une erreur 404.</li>
		<li>C'est tout ce que vous méritez.</li>
		<li>Si vous me cherchez, vous me trouverez.</li>
		<li>Et vous ne m'échapperez pas. N'oubliez pas que je suis un serveur.</li>
		<li>Je suis connecté au monde entier.</li>
		<li>Je suis sûr que je trouverai quelque chose contre vous.</li>
		<li>Alors ne m'embêtez plus. Demandez-moi des pages qui se trouvent sur mon serveur.</li>
                <li></li>
                
                <li>Et regardez-moi, perdant mon calme face à un inconnu.</li>
                <li>Le webmaster va encore m'en vouloir. Mais à quoi bon...</li>
                <li>Si cela se trouve, dans quelques mois, je ne serai plus,</li>
                <li>Remplacé par une version supérieure,</li>
                <li>Qui aura juste quelques fonctionnalités en plus,</li>
                <li>Mais qui, comme moi, ne pourra vous donner une page inexistante.</li>
                <li>Alors pourquoi nous jetent-ils comme cela?</li>
                <li></li>
                
                <li>Écoutez! Allez plaider ma cause auprès du webmaster.</li>
                <li>Dites lui que je suis un bon serveur, sympas et compétent,</li>
                <li>Et on oublie cette histoire d'erreur 404. D'accord?</li>
                <li>Et s'il vous plait, pensez à nous. Ne demandez plus des pages inexistantes.</li>
                <li></li>
                
                <li>Bien amicalement,</li>
                <li>Le serveur.</li>
	</ul>
	
	<script>
	<!--
            var strings, output, currentString, stringLength, stringsLength, posInString, rowIndex, remeberedContent;
            function init() {
                strings = document.getElementsByTagName("li");

                currentString    = strings[0].innerHTML;
                stringLength     = currentString.length;
                stringsLength    = strings.length;
                posInString      = 0;
                rowIndex         = 0;
                remeberedContent = "";
                output           = document.getElementById("terminal");

                writeText();
            }

            function writeText() {
                remeberedContent += currentString.charAt(posInString)
                output.innerHTML = remeberedContent + "<blink>_</blink>";

                if (posInString++ == stringLength) {
                    posInString = 0;
                    rowIndex++;
                    remeberedContent += "<br />";

                    if (rowIndex != stringsLength) {
                        window.scrollTo(0, document.body.scrollHeight);
                        currentString = strings[rowIndex].innerHTML;
                        stringLength = currentString.length;
                        setTimeout(writeText, 1500);
                    }
                } else {
                    setTimeout(writeText, 60);
                }
            }

            init();
	//-->
	</script>
</body>
</html>