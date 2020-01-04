<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:image" content="loulesoft-logo.jpg">
        <meta property="og:type" content="website">
        <meta property="og:url" content="http://loulesoft.com.br">
        <meta property="og:title" content="LouleSoft">
        <meta property="og:description" content="Desenvolvemos sites, sistemas e apps com simplicidade e sofisticação.">
        <title>LouleSoft</title>
        <link rel="stylesheet" href="styles.css">
        <!-- Script para validação do formulário em JS -->
        <script>
            function validate(form)
            {
                fail  = validateName(form.clientname.value);
                fail += validateEmail(form.clientemail.value);
                fail += validatePhone(form.clientphone.value);
                fail += validateMessage(form.clientMessage.value);

                if (fail == "") { return true }
                else { alert(fail); return false; }
            }

            function validateName(field)
            {
                return (field == "") ? "Nenhum nome foi digitado\n" : "";
            }

            function validateEmail(field)
            {
                if (field == "") return "Nenhum e-mail foi digitado\n";
                else if (!((field.indexOf(".") > 0) &&
                        (field.indexOf("@") > 0)) ||
                        /[^a-zA-Z0-9.@_-]/.test(field))
                    return "E-mail inválido\n";
                return "";
            }

            function validatePhone(field)
            {
                if (field == "") return "Nenhum telefone foi digitado\n";
                else if (field.length != 10 && field.length != 11)
                    return "Telefones, no Brasil, devem ter exatamente dez ou onze dígitos\n";
                else if (/[^0-9]/.test(field))
                    return "Telefones devem conter apenas números\n";
                return "";
            }

            function validateMessage(field)
            {
                return (field == "") ? "Nenhuma mensagem foi digitada\n" : "";
            }
        </script>
    </head>
    <body>
        <div id="container">
            <header>
                <img src="loulesoft-logo.png" alt="LouleSoft Logo">
            </header>
            <ul id="nav">
                <div id="menu" class="menuhide">
                    <li><a href="./">Home</a></li>
                    <li><a href="#about">Sobre</a></li>
                    <li><a href="#services">Serviços</a></li>
                    <li><a href="#contact">Contato</a></li>
                </div>
                <div id="menubuttons">
                    <li id="menubutton-show"><a href="#"><img src="showmenu.png" alt="Menu"></a></li>
                    <li id="menubutton-hide" style="display: none"><a href="#"><img src="hidemenu.png" alt="Menu"></a></li>
                </div>
            </ul>
            <img id="banner" src="loulesoft-banner.jpg" alt="LouleSoft Banner">
            <section id="about">
                <h1>Sobre</h1>
                <p>Desenvolvemos <b>sites</b>, <b>sistemas</b> e <b>apps</b> com simplicidade e sofisticação.</p>
                <p>Da Vinci disse que "a <b>simplicidade</b> é a máxima <b>sofisticação</b>". Alinhados ao pensamento desse gênio, procuramos sempre simplificar nosso trabalho, sem, no entanto, deixar de fazer uso do que há de mais atual e melhor em se tratando de linguagens de programação, padrões e tecnologias.</p>
            </section>
            <section id="services">
                <h1>Serviços</h1>
                <div>
                    <div class="service-img"><img src="sites.png" alt="Sites"></div>
                    <div><p>Construímos <b>sites</b> para divulgar seu negócio ou empresa e também lojas virtuais para vender seus produtos e serviços. Podemos fazer um site do zero para você, com base no logotipo que sua empresa usa, isso irá reforçar e fortalecer a imagem de sua empresa. Utilizamos, para isso, desde PHP puro à utilização de WordPress. A escolha é sua.</p></div>
                </div>
                <div>
                    <div class="service-img"><img src="systems.png" alt="Sites"></div>
                    <div><p>Pode ser que sua empresa ou negócio precise de um <b>sistema</b> para uma melhor organização. Com um sistema personalizado para sua empresa você irá aumentar sua competitividade, sua tranquilidade e seus lucros. Lembrando que não basta servir para sua empresa, tem que ser personalizado, pois cada empresa possui sua própria identidade e desafios.</p></div>
                </div>
                <div>
                    <div class="service-img"><img src="apps.png" alt="Sites"></div>
                    <div><p>Às vezes um site não é suficiente e você precisa do poder que só um <b>app</b> oferece. Sabemos como eles estão comuns hoje em dia. E pode ser que sua empresa precise de um! Um app pode oferecer aos seus clientes uma melhor interação com sua empresa. Utilizamos Xamarin para desenvolver aplicativos multiplataforma para Android e iOS.</p></div>
                </div>
            </section>
            <section id="contact">
                <h1>Contato</h1>
                <!-- Script para processamento do formulário -->
                <?php
                    $client_name = $client_company = $client_email = $client_phone = $client_message = "";

                    if (isset($_POST['clientname']))
                        $client_name = fix_string($_POST['clientname']);
                    if (isset($_POST['clientcompany']))
                        $client_company = fix_string($_POST['clientcompany']);
                    if (isset($_POST['clientemail']))
                        $client_email = fix_string($_POST['clientemail']);
                    if (isset($_POST['clientphone']))
                        $client_phone = fix_string($_POST['clientphone']);
                    if (isset($_POST['clientmessage']))
                        $client_message = fix_string($_POST['clientmessage']);
                    
                    $fail  = validate_name($client_name);
                    $fail .= validate_email($client_email);
                    $fail .= validate_phone($client_phone);
                    $fail .= validate_message($client_message);

                    if ($fail == "")
                    {
                        $to = 'amandoloule@gmail.com';
                        $subject = 'LouleSoft - Contato';
                        $msg = "Nome: $client_name\n" .
                            "Empresa: $client_company\n" .
                            "E-mail: $client_email\n" .
                            "Telefone: $client_phone\n" .
                            "Mensagem: $client_message\n";
                        mail($to, $subject, $msg, 'From: ' . $client_email);
                        echo "<p>Obrigado por entrar em contato. Breve lhe responderemos.<br></p>";
                    }
                    else if (isset($_POST['clientname']))
                    {
                        echo "<p><b>Desculpe, os seguintes erros foram encontrados:</b><br><br>$fail</p>";
                    }
                ?>
                <form method="POST" action="index.php#contact" onSubmit="return validade(this)">
                    <table>
                        <tr>
                            <td class="table-col-1">Nome:</td>
                            <td class="table-col-2"><input type="text" maxlength="64" id="clientname" name="clientname" value="<?php echo $client_name; ?>"></td>
                        </tr>
                        <tr>
                            <td class="table-col-1">Empresa:</td>
                            <td class="table-col-2"><input type="text" maxlength="64" id="clientcompany" name="clientcompany" value="<?php echo $client_company; ?>"></td>
                        </tr>
                        <tr>
                            <td class="table-col-1">E-mail:</td>
                            <td class="table-col-2"><input type="text" maxlength="64" id="clientemail" name="clientemail" value="<?php echo $client_email; ?>"></td>
                        </tr>
                        <tr>
                            <td class="table-col-1">Fone:</td>
                            <td class="table-col-2"><input type="text" maxlength="12" id="clientcompany" name="clientphone" value="<?php echo $client_phone; ?>"></td>
                        </tr>
                        <tr>
                            <td class="table-col-1">Mensagem:</td>
                            <td class="table-col-2"><textarea maxlength="1024" id="clientmessage" name="clientmessage"><?php echo $client_message; ?></textarea></td>
                        </tr>
                    </table>
                    <?php if ($fail != "") echo '<div><input type="submit" value="Enviar" id="submit" name="submit"></div>'; ?>
                </form>
            </section>
            <footer>
                <p>Copyright, 2019, <img src="loulesoft-logo2.png" alt="LouleSoft Logo"></p>
                <span>
                    <img src="facebook-logo.png" alt="Facebook">
                    <img src="whatsapp-logo.png" alt="WhatsApp">
                </span>
            </footer>
        </div>
        <!-- Script para menu Mobile -->
        <script>
            var link1 = document.getElementById('menubutton-show');
            var link2 = document.getElementById('menubutton-hide');
            var links = document.getElementById('menu').childNodes;
            link1.firstChild.onclick = function() {
                showMenu();
            };
            link2.firstChild.onclick = function() {
                showMenu();
            };
            for (i = 0; i < links.length; i++)
            {
                links[i].onclick = function () { closeMenu(); };
            }
            function showMenu()
            {
                var menu = document.getElementById('menu');
                if (menu.className == 'menuhide')
                {
                    menu.className = 'menushow';
                    link1.style.display = 'none';
                    link2.style.display = 'block';
                }
                else
                {
                    menu.className = 'menuhide';
                    link2.style.display = 'none';
                    link1.style.display = 'block';
                }
            }
            function closeMenu()
            {
                menu.className = 'menuhide';
                link2.style.display = 'none';
                link1.style.display = 'block';
            }
        </script>
    </body>
</html>
<!-- Script para validação do formulário em PHP -->
<?php
    function validate_name($field)
    {
        return ($field == "") ? "Nenhum nome foi digitado<br>" : "";
    }

    function validate_email($field)
    {
        if ($field == "") return "Nenhum e-mail foi digitado<br>";
        else if (!((strpos($field, ".") > 0) &&
                   (strpos($field, "@") > 0)) ||
                   preg_match("/[^a-zA-Z0-9.@_-]/", $field))
            return "E-mail inválido<br>";
        return "";
    }

    function validate_phone($field)
    {
        if ($field == "") return "Nenhum telefone foi digitado<br>";
        else if (strlen($field) != 10 && strlen($field) != 11)
            return "Telefones, no Brasil, devem ter exatamente dez ou onze dígitos<br>";
        else if (preg_match("/[^0-9]/", $field))
            return "Telefones devem conter apenas números<br>";
        return "";
    }

    function validate_message($field)
    {
        return ($field == "") ? "Nenhuma mensagem foi digitada<br>" : "";
    }

    function fix_string($string)
    {
        if (get_magic_quotes_gpc()) $string = stripcslashes($string);
        return htmlentities($string);
    }
?>