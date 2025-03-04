<?php
include('protect.php');
include('conexao.php');
include('socialmedias.php');

$nome_tabela = 'db_table_perfil_usuarios';
$nome_coluna_apelido = 'db_column_apelido';
$nome_coluna_biografia = 'db_column_biografia';
$id_usuario = $_SESSION['id'];

// Query SQL para selecionar os dados das colunas 'db_column_apelido' e 'db_column_biografia'
$sql = "SELECT $nome_coluna_apelido, $nome_coluna_biografia FROM $nome_tabela WHERE id = '$id_usuario'";

// Execute a consulta
$result = $mysqli->query($sql);

// Verifique se a consulta foi bem-sucedida
if ($result === false) {
    die("Erro na consulta: " . $mysqli->error);
}

// Obtém os valores das colunas (se houver resultados)
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $apelido = $row[$nome_coluna_apelido];
    $biografia = $row[$nome_coluna_biografia];
}

// Feche a conexão com o banco de dados
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/main-profile.css">
    <link rel="stylesheet" href="styles/header-profile.css">
    <link rel="shortcut icon" href="https://i.imgur.com/1LdRVjc.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['db_column_nome'];?> &bull; Koiso</title>
</head>
<body>
    <!--HEADER (CABEÇARIO DO SITE)-->
    <header>
        <!--BOTÃO (EDIT)-->
        <a class="btn-header" id="active">Edit</a>

            <!--JANELA POPUP (EDIT)-->
            <div class="container-popup" id="container">
                <div class="popup">






                    <!--MENU DE NAVEGAÇÃO DO POPUP EDIT (LADO ESQUERDO)-->
                    <nav class="popup-nav">
                        <ul>
                            <div class="perfil-topic-nav">
                                <h2>PROFILE</h2>
                                <div class="perfil-topic-btn-design-nav">
                                    <li>
                                        <a class="perfil-edit-btn-nav" href="#" onclick="mostrarPopup('popupedit1')">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0858 8.41416C21.8668 7.63311 21.8668 6.36678 21.0858 5.58573L18.4142 2.91416C17.6332 2.13311 16.3668 2.13311 15.5858 2.91416L3.58579 14.9142C3.21071 15.2892 3 15.7979 3 16.3284V19.9999C3 20.5522 3.44772 20.9999 4 20.9999H7.67157C8.20201 20.9999 8.71071 20.7892 9.08579 20.4142L21.0858 8.41416ZM13.8184 7.50999L16.4899 10.1816L7.67157 18.9999H5L5 16.3284L13.8184 7.50999ZM17.9042 8.76735L15.2326 6.09578L17 4.32837L19.6716 6.99994L17.9042 8.76735Z" fill="white"/>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="perfil-edit-btn-nav" href="#" onclick="mostrarPopup('popupedit2')">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3 5C3 3.89543 3.89543 3 5 3H9C10.1046 3 11 3.89543 11 5V9C11 10.1046 10.1046 11 9 11H5C3.89543 11 3 10.1046 3 9V5ZM5 5H9V9H5V5Z" fill="white"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5 13C3.89543 13 3 13.8954 3 15V19C3 20.1046 3.89543 21 5 21H9C10.1046 21 11 20.1046 11 19V15C11 13.8954 10.1046 13 9 13H5ZM5 15H9V19H5V15Z" fill="white"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15 3C13.8954 3 13 3.89543 13 5V9C13 10.1046 13.8954 11 15 11H19C20.1046 11 21 10.1046 21 9V5C21 3.89543 20.1046 3 19 3H15ZM15 5H19V9H15V5Z" fill="white"/>
                                                <path d="M17 21C16.4477 21 16 20.5523 16 20V18H14C13.4477 18 13 17.5523 13 17C13 16.4477 13.4477 16 14 16H16V14C16 13.4477 16.4477 13 17 13C17.5523 13 18 13.4477 18 14V16H20C20.5523 16 21 16.4477 21 17C21 17.5523 20.5523 18 20 18H18V20C18 20.5523 17.5523 21 17 21Z" fill="white"/>
                                            </svg>
                                        </a>
                                    </li>
                                </div>
                            </div>
                            <div class="perfil-topic-nav">
                                <h2>MORE</h2>
                                <div class="perfil-topic-btn-design-nav">
                                    <li>
                                        <a class="perfil-edit-btn-nav" href="#" onclick="mostrarPopup('popupedit3')">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1 11C1 13.2091 2.79086 15 5 15H5.41055L6.40112 19.7052C6.68137 21.0364 8.18011 21.7054 9.35822 21.0252L11 20.0774C11.6188 19.7201 12 19.0598 12 18.3453L12 15.8052C13.4117 16.2828 14.7542 16.9673 15.9815 17.8439L18.605 19.7179C18.8619 19.9014 19.1697 20 19.4854 20C20.3219 20 21 19.3219 21 18.4854V3.51462C21 2.67812 20.3219 2 19.4854 2C19.1697 2 18.8619 2.09864 18.605 2.28212L15.9815 4.1561C13.392 6.00571 10.2894 7 7.10717 7H5C2.79086 7 1 8.79086 1 11ZM17.1439 5.78357L19 4.45781V17.5422L17.1439 16.2164C14.2153 14.1245 10.7062 13 7.10717 13H5C3.89543 13 3 12.1046 3 11C3 9.89543 3.89543 9 5 9H7.10717C10.7062 9 14.2153 7.87546 17.1439 5.78357ZM10 15.2766C9.16442 15.1153 8.3133 15.0235 7.45522 15.004L8.35822 19.2932L10 18.3453V15.2766Z" fill="white"/>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="perfil-edit-btn-nav" href="#" onclick="mostrarPopup('popupedit4')">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.2756 13.5065C10.9983 13.5065 10.7627 13.2794 10.7993 13.0046C10.8196 12.8526 10.8513 12.7447 10.8945 12.5978C10.8956 12.5942 10.8966 12.5905 10.8977 12.5869C10.9053 12.5613 10.9131 12.5344 10.9213 12.5059C11.0204 12.1735 11.1642 11.9051 11.3528 11.7005C11.5414 11.496 11.7683 11.3106 12.0336 11.1444C12.2317 11.0166 12.4091 10.8839 12.5657 10.7465C12.7223 10.6091 12.8469 10.4573 12.9396 10.2911C13.0323 10.1217 13.0787 9.93313 13.0787 9.72539C13.0787 9.50486 13.0259 9.3115 12.9205 9.14531C12.815 8.97912 12.6728 8.85128 12.4938 8.76179C12.318 8.6723 12.1231 8.62756 11.9089 8.62756C11.7012 8.62756 11.5046 8.6739 11.3193 8.76658C11.1339 8.85607 10.9821 8.9903 10.8638 9.16928C10.8251 9.22677 10.7923 9.28887 10.7652 9.35558C10.6641 9.6049 10.459 9.82606 10.19 9.82606H9.22875C8.94771 9.82606 8.71708 9.59328 8.76178 9.31582C8.82867 8.90053 8.96685 8.54327 9.17632 8.24403C9.46715 7.82535 9.85228 7.51374 10.3317 7.3092C10.8111 7.10145 11.34 6.99758 11.9185 6.99758C12.5545 6.99758 13.117 7.10305 13.606 7.31399C14.095 7.52173 14.4785 7.82376 14.7566 8.22006C15.0346 8.61637 15.1737 9.09418 15.1737 9.65348C15.1737 10.0274 15.1113 10.3598 14.9867 10.6506C14.8652 10.9383 14.6943 11.194 14.4737 11.4177C14.2532 11.6382 13.9927 11.838 13.6923 12.0169C13.4398 12.1672 13.2321 12.3238 13.0691 12.4868C12.9093 12.6498 12.7894 12.8383 12.7095 13.0525C12.7037 13.0687 12.6981 13.0851 12.6926 13.1015C12.6167 13.3313 12.4136 13.5065 12.1716 13.5065H11.2756Z" fill="white"/>
                                                <path d="M11.7219 17.0746C11.4023 17.0746 11.1291 16.9628 10.9022 16.7391C10.6784 16.5121 10.5682 16.2405 10.5714 15.9241C10.5682 15.6109 10.6784 15.3424 10.9022 15.1187C11.1291 14.895 11.4023 14.7831 11.7219 14.7831C12.0256 14.7831 12.2924 14.895 12.5226 15.1187C12.7527 15.3424 12.8693 15.6109 12.8725 15.9241C12.8693 16.135 12.8134 16.3284 12.7047 16.5042C12.5993 16.6767 12.4602 16.8158 12.2876 16.9212C12.1151 17.0235 11.9265 17.0746 11.7219 17.0746Z" fill="white"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12Z" fill="white"/>
                                            </svg>
                                        </a>
                                    </li>
                                </div>
                            </div>
                            <div>
                                <div class="perfil-topic-btn-design-nav">
                                    <a class="perfil-edit-btn-nav" href="logout.php">
                                        <div class="logout-btn">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="#c90000" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 3.99998C12 4.55227 11.5523 4.99998 11 4.99998H5L5 19H11C11.5523 19 12 19.4477 12 20C12 20.5523 11.5523 21 11 21H5C3.89543 21 3 20.1046 3 19V4.99998C3 3.89541 3.89543 2.99998 5 2.99998H11C11.5523 2.99998 12 3.4477 12 3.99998Z" fill="#c90000"/>
                                                <path d="M15.0001 15.5858L17.5858 13.0001H9.00005C8.44776 13.0001 8.00005 12.5524 8.00005 12.0001C8.00005 11.4478 8.44777 11.0001 9.00005 11.0001L17.5858 11.0001L15 8.41426C14.6095 8.02374 14.6095 7.39058 15 7.00005C15.3905 6.60953 16.0237 6.60953 16.4142 7.00005L20.7072 11.293C20.8947 11.4805 21 11.7349 21 12.0001C21 12.2653 20.8947 12.5197 20.7072 12.7072L16.4143 17.0001C16.0238 17.3906 15.3906 17.3906 15.0001 17.0001C14.6096 16.6095 14.6096 15.9764 15.0001 15.5858Z" fill="#c90000"/>
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </ul>
                    </nav>

                    <!--CONTEUDO DO POPUP EDIT (LADO CENTRAL)-->
                    <section class="popup-edit">

                        <!--(BOTÃO MENU) NOME, EMAIL, BIO, AVATAR, BANNER, TAGS, CORES-->
                        <div class="popupsectionative" id="popupedit1">
                            <form class="popup-content" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                <h2 class="popup-content-title">Customize your profile</h2>

                                <!--EDITAR AVATAR E BANNER-->
                                <div class="div-content1">
                                    <label class="div-content1-pt1" for="">Avatar and Banner</label>
                                    <div class="div-content1-pt2">
                                        <label class="avatar-input-edit" for="picture-input">CHANGE AVATAR</label>
                                        <input id="picture-input" type="file" accept="image/*">
                                        <label class="banner-input-edit" for="banner-input" tabindex="0">CHANGE BANNER</label>
                                        <input id="banner-input" type="file" accept="image/*">
                                    </div>
                                </div>

                                <!--EDITAR APELIDO-->
                                <div class="div-content2">
                                    <label class="div-content2-pt1" for="nickname-input">Nickname</label>
                                    <div class="div-content2-pt2">
                                        <input type="text" name="nickname-user" id="nickname-input" placeholder="Put your nickname">
                                    </div>
                                </div>

                                <!--EDITAR NOME DE USUÁRIO-->
                                <div class="div-content5">
                                    <label class="div-content5-pt1" for="username-input">Username&nbsp;
                                        <svg width="22px" height="22px" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M16 12H17.4C17.7314 12 18 12.2686 18 12.6V19.4C18 19.7314 17.7314 20 17.4 20H6.6C6.26863 20 6 19.7314 6 19.4V12.6C6 12.2686 6.26863 12 6.6 12H8M16 12V8C16 6.66667 15.2 4 12 4C8.8 4 8 6.66667 8 8V12M16 12H8" stroke="#d13131" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                    </label>
                                    <div class="div-content5-pt2">
                                        <input type="text" name="nickname-user" id="username-input" placeholder="<?php echo $_SESSION['db_column_nome'];?>" readonly>
                                        
                                    </div>
                                </div>

                                <!--EDITAR BIOGRAFIA-->
                                <div class="div-content3">
                                    <label class="div-content3-pt1" for="bio-input">Biography</label>
                                    <div class="div-content3-pt2">
                                        <textarea id="bio-input" name="biografia-input" maxlength="600" rows="10" spellcheck="false" placeholder="Put your bio"></textarea>
                                    </div>
                                </div>

                                <!--EDITAR TAGS-->
                                <div>
                                    <label class="add-tags-tittle">Add tags</label>
                                    <div class="add-tags-content">
                                        <!--<div class="add-tags">
                                            <input class="add-tags-input" type="text" placeholder="Add a tag at your profile">
                                            <button class="add-button" href="">Add +</button>
                                        </div>-->
                                        <div class="add-tags-edit-row">

                                            <div class="add-tags-edit" onclick="toggle_adds_tags(this)">Teacher</div>
                                            <div class="add-tags-edit"onclick="toggle_adds_tags(this)">Gym</div>
                                            <div class="add-tags-edit"onclick="toggle_adds_tags(this)">Church</div>
                                            <div class="add-tags-edit"onclick="toggle_adds_tags(this)">Gamer</div>
                                            <div class="add-tags-edit"onclick="toggle_adds_tags(this)">Designer</div>
                                            <div class="add-tags-edit"onclick="toggle_adds_tags(this)">Lover</div>
                                            <div class="add-tags-edit"onclick="toggle_adds_tags(this)">Student</div>
                                            <div class="add-tags-edit"onclick="toggle_adds_tags(this)">Reader</div>
                                            <div class="add-tags-edit"onclick="toggle_adds_tags(this)">Writer</div>
                                            <div class="add-tags-edit"onclick="toggle_adds_tags(this)">Musician</div>
                                            <div class="add-tags-edit"onclick="toggle_adds_tags(this)">Traveler</div>
                                            <div class="add-tags-edit"onclick="toggle_adds_tags(this)">Vegan</div>
                                            <div class="add-tags-edit"onclick="toggle_adds_tags(this)">Languages student</div>
                                            <div class="add-tags-edit"onclick="toggle_adds_tags(this)">Animals</div>
                                            <div class="add-tags-edit"onclick="toggle_adds_tags(this)">Healthy life</div>
                                            <div class="add-tags-edit"onclick="toggle_adds_tags(this)">Photographer</div>
                                            <div class="add-tags-edit"onclick="toggle_adds_tags(this)">Photos</div>
                                            <div class="add-tags-edit"onclick="toggle_adds_tags(this)">Music</div>
                                            <div class="add-tags-edit"onclick="toggle_adds_tags(this)">Friendly</div>
                                        </div>            
                                    </div>
                                </div>
                                <div>
                                    <label class="color-selector-title">Profile color</label>
                                    <div id="color-selector-background">
                                        <input type="color" id="colorPicker">
                                    </div>
                                </div>
                                <button class="save-btn" type="submit">Save</button>
                            </form>
                        </div>

                        <!--(BOTÃO MENU) LINK E SOCIALMEDIAS-->
                        <div class="popupsectionative" id="popupedit2">
                            <form class="popup-content">
                                <h2 class="popup-content-title">Links and Social Medias</h2> 

                                <!--EDITAR SOCIALMEDIA-->
                                <div>
                                    <label class="social-medias-tittle">Add a social media</label>
                                    <div class="social-medias-popup">
                                        <div class="discord">
                                            <img src="https://assets-global.website-files.com/6257adef93867e50d84d30e2/636e0a6a49cf127bf92de1e2_icon_clyde_blurple_RGB.png" alt="">
                                            <input id="discord-input" type="text" placeholder="Discord">
                                        </div>
                                        <div class="github">
                                            <img src="https://cdn.icon-icons.com/icons2/2429/PNG/512/github_logo_icon_147285.png" alt="">
                                            <input class="github-input" type="text" placeholder="Github">
                                        </div>
                                        <div class="instagram">
                                            <img src="https://png.pngtree.com/png-vector/20221018/ourmid/pngtree-instagram-social-platform-icon-png-image_6315976.png" alt="">
                                            <input class="instagram-input" type="text" placeholder="Instagram">
                                        </div>

                                        <div class="linkedin">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/LinkedIn_logo_initials.png/640px-LinkedIn_logo_initials.png" alt="">
                                            <input class="linkedin-input" type="text" placeholder="Linkedin">
                                        </div>
                                        <div class="spotify">
                                            <img src="https://www.freepnglogos.com/uploads/spotify-logo-png/file-spotify-logo-png-4.png" alt="">
                                            <input class="spotify-input" type="text" placeholder="Spotify">
                                        </div>
                                    </div>
                                </div>
                                <button class="save-btn" type="submit">Save</button> 
                            </form>
                        </div>
                        <div class="popupsectionative" id="popupedit3">
                            <h2 class="popup-content-title">Updates</h2>
                            <div class="updates-link-to-discord">
                                <p class="updates-link-to-discord-text">Stay up to date with our updates on discord</p>
                                <a href="https://discord.gg/skNHSjaEva">
                                    <svg margin-top="40px" width="30px" height="30px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="#7289da">
                                        <path d="M5.5 16c5 2.5 8 2.5 13 0M15.5 17.5l1 2s4.171-1.328 5.5-3.5c0-1 .53-8.147-3-10.5-1.5-1-4-1.5-4-1.5l-1 2h-2" stroke="#7289da" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M8.528 17.5l-1 2s-4.171-1.328-5.5-3.5c0-1-.53-8.147 3-10.5 1.5-1 4-1.5 4-1.5l1 2h2" stroke="#7289da" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M8.5 14c-.828 0-1.5-.895-1.5-2s.672-2 1.5-2 1.5.895 1.5 2-.672 2-1.5 2zM15.5 14c-.828 0-1.5-.895-1.5-2s.672-2 1.5-2 1.5.895 1.5 2-.672 2-1.5 2z" stroke="#7289da" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="popupsectionative" id="popupedit4">
                            <h2 class="popup-content-title">Help</h2>
                            <div class="updates-link-to-discord">
                                <p class="updates-link-to-discord-text">Get help and suport on discord</p>
                                <a href="https://discord.gg/skNHSjaEva">
                                    <svg margin-top="40px" width="30px" height="30px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="#7289da">
                                        <path d="M5.5 16c5 2.5 8 2.5 13 0M15.5 17.5l1 2s4.171-1.328 5.5-3.5c0-1 .53-8.147-3-10.5-1.5-1-4-1.5-4-1.5l-1 2h-2" stroke="#7289da" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M8.528 17.5l-1 2s-4.171-1.328-5.5-3.5c0-1-.53-8.147 3-10.5 1.5-1 4-1.5 4-1.5l1 2h2" stroke="#7289da" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M8.5 14c-.828 0-1.5-.895-1.5-2s.672-2 1.5-2 1.5.895 1.5 2-.672 2-1.5 2zM15.5 14c-.828 0-1.5-.895-1.5-2s.672-2 1.5-2 1.5.895 1.5 2-.672 2-1.5 2z" stroke="#7289da" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </section>

                    <!--BOTÃO DE FECHAR DO POPUP EDIT (LADO DIREITO)-->
                    <section class="popup-close">
                        <div id="unactive">
                            <svg width="24" height="24" viewBox="0" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.6585 4.92888C18.049 4.53836 18.6822 4.53835 19.0727 4.92888C19.4632 5.3194 19.4632 5.95257 19.0727 6.34309L13.4158 12L19.0727 17.6568C19.4632 18.0473 19.4632 18.6805 19.0727 19.071C18.6822 19.4615 18.049 19.4615 17.6585 19.071L12.0016 13.4142L6.34481 19.071C6.3387 19.0771 6.33254 19.0831 6.32632 19.089C5.93455 19.4614 5.31501 19.4554 4.93059 19.071C4.6377 18.7781 4.56447 18.3487 4.71092 17.9876C4.75973 17.8672 4.83296 17.7544 4.93059 17.6568L10.5874 12L4.93059 6.34314C4.54006 5.95262 4.54006 5.31945 4.93059 4.92893C5.32111 4.5384 5.95428 4.5384 6.3448 4.92893L12.0016 10.5857L17.6585 4.92888Z" fill="white"/>
                            </svg>
                        </div>
                    </section>
                </div>
            </div>

        <!--BOTÃO (SHARE)-->
        <a class="btn-header2" id="active2">Share</a>
            <div class="container-popup2" id="container2">
                <div class="popup2">
                    <div class="popup-header2">
                        <h1>Share your profile</h1>
                        <button id="unactive2">&#10006;</button>
                    </div>
                    <div class="popup-header-content2">
                        <input type="text" id="copylink" value="https://www.koiso.so/<?php echo $_SESSION['db_column_nome'];?>">
                        <button id="botao">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.0603 5.28225C12.6698 5.67278 12.0369 5.67308 11.6464 5.28256C11.2559 4.89203 11.2559 4.25887 11.6464 3.86834L11.9995 3.51468C14.3426 1.17154 18.1416 1.17154 20.4848 3.51468C22.8279 5.85783 22.8279 9.65682 20.4848 12L18.0099 14.4748C15.6668 16.8179 11.868 16.818 9.52484 14.4751C9.13437 14.0846 9.13457 13.4512 9.52508 13.0607C9.9156 12.6702 10.5488 12.6702 10.9393 13.0607C12.5014 14.6225 15.0337 14.6226 16.5957 13.0606L19.0705 10.5858C20.6326 9.02365 20.6326 6.49099 19.0705 4.9289C17.5084 3.3668 14.9758 3.3668 13.4137 4.9289L13.0603 5.28225Z" fill="white"/>
                                <path d="M12.3532 20.1315L11.9995 20.4852C9.65633 22.8284 5.85734 22.8284 3.5142 20.4852C1.17105 18.1421 1.17105 14.3431 3.5142 12L5.98907 9.52508C8.33221 7.18194 12.1314 7.18217 14.4746 9.52532C14.8651 9.91584 14.8654 10.5489 14.4748 10.9394C14.0843 11.3299 13.4507 11.3298 13.0601 10.9393C11.498 9.3772 8.96538 9.3772 7.40328 10.9393L4.92841 13.4142C3.36631 14.9763 3.36631 17.5089 4.92841 19.071C6.49051 20.6331 9.02317 20.6331 10.5853 19.071L10.9393 18.7176C11.3298 18.3271 11.963 18.3271 12.3535 18.7176C12.744 19.1081 12.7437 19.741 12.3532 20.1315Z" fill="white"/>
                            </svg>
                            Copy link
                        </button>
                    </div>
                </div>
            </div>
    </header>












    <main>
        <!--POPUP DE AVISO
        <div class="modificacoes-salvas">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
            <p>Saved changes</p>
        </div>
        -->
        <div class="card">
            <div class="parte-superior">
                <div class="banner-picture">
                    <label class="banner" tabindex="0">
                        <span class="banner-image"></span>
                    </label>
                </div>
                <div class="center">
                    <div class="profile-picture">
                        <label id="picture" tabindex="0">
                            <span class="picture-image"></span>
                        </label>
                    </div>
                    <div class="nicks">
                        <p class="name">
                        <?php echo $apelido; ?>
                        </p>
                        <p class="username">
                            ko/<?php echo $_SESSION['db_column_nome'];?>
                        </p>
                    </div>
                    <div class="social-medias-output">
                        <div>
                            <svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="2" fill="none" xmlns="http://www.w3.org/2000/svg" color="#7289da">
                                <path d="M5.5 16C10.5 18.5 13.5 18.5 18.5 16" stroke="#7289da" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M15.5 17.5L16.5 19.5C16.5 19.5 20.6713 18.1717 22 16C22 15 22.5301 7.85339 19 5.5C17.5 4.5 15 4 15 4L14 6H12" stroke="#7289da" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M8.52832 17.5L7.52832 19.5C7.52832 19.5 3.35699 18.1717 2.02832 16C2.02832 15 1.49823 7.85339 5.02832 5.5C6.52832 4.5 9.02832 4 9.02832 4L10.0283 6H12.0283" stroke="#7289da" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M8.5 14C7.67157 14 7 13.1046 7 12C7 10.8954 7.67157 10 8.5 10C9.32843 10 10 10.8954 10 12C10 13.1046 9.32843 14 8.5 14Z" stroke="#7289da" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M15.5 14C14.6716 14 14 13.1046 14 12C14 10.8954 14.6716 10 15.5 10C16.3284 10 17 10.8954 17 12C17 13.1046 16.3284 14 15.5 14Z" stroke="#7289da" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <span class="social-medias-text">Kousei#5628</span>
                        </div>
                        <div>
                            <svg width="24px" height="24px" viewBox="0" stroke-width="2" fill="none" xmlns="http://www.w3.org/2000/svg" color="#1DB954">
                                <path d="M7 15C7 15 11.5 14 16 16" stroke="#1DB954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M6.5 12C6.5 12 12.5 10.5 17.5 13.5" stroke="#1DB954" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M6 9.00003C9 8.50005 14 8.00006 19 11" stroke="#1DB954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22Z" stroke="#1DB954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <span class="social-medias-text">Kou</span>
                        </div>
                        <div>
                            <svg width="22px" height="22px" stroke-width="2" viewBox="0" fill="none" xmlns="http://www.w3.org/2000/svg" color="#e2466f">
                                <path d="M12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z" stroke="#e2466f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M3 16V8C3 5.23858 5.23858 3 8 3H16C18.7614 3 21 5.23858 21 8V16C21 18.7614 18.7614 21 16 21H8C5.23858 21 3 18.7614 3 16Z" stroke="#e2466f" stroke-width="2"></path>
                                <path d="M17.5 6.51L17.51 6.49889" stroke="#e2466f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <span class="social-medias-text">@almerodi</span>
                        </div>
                        <div>
                            <svg width="24px" height="24px" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#0072b1">
                                <path d="M21 8V16C21 18.7614 18.7614 21 16 21H8C5.23858 21 3 18.7614 3 16V8C3 5.23858 5.23858 3 8 3H16C18.7614 3 21 5.23858 21 8Z" stroke="#0072b1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M7 17V13.5V10" stroke="#0072b1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M11 17V13.75M11 10V13.75M11 13.75C11 10 17 10 17 13.75V17" stroke="#0072b1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M7 7.01L7.01 6.99889" stroke="#0072b1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <span class="social-medias-text">in/rodrigopasquim</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="parte-inferior">
                <div class="sub-div-esquerda">
                    <div class="biografia">
                        <textarea class="biografia-text" name="biografia" maxlength="600" rows="10" spellcheck="false" disabled><?php echo $biografia;?></textarea>
                    </div>
                    <div>
                        <div id="tags">Programming</div>
                        <div id="tags">Dev-Ops</div>
                        <div id="tags">Front-end</div>
                        <div id="tags">Gym</div>
                    </div>
                </div>
                <div class="sub-div-direita">
                </div>
            </div>
        </div>
    </main>
    <script src="scripts/background-color.js"></script>
    <script src="scripts/edit-pop-up.js"></script>
    <script src="scripts/input-pic.js"></script>
    <script src="scripts/share-link.js"></script>
    <script src="scripts/secoes-edit-pop-up.js"></script>
    <script src="scripts/add-tags.js"></script>
</body>
</html>