<header id="menu">
    <div class="menu_container">
        <div class="menu_logo">
            <img src="imgs/icones/medalha.png" alt="" />
        </div>
        <nav class="menu_links">
            <div class="btn_mobile">
                <img src="imgs/icones/menu.png" alt=""/>
            </div>
            <ul>
                <li><a href="index.php">INÍCIO</a></li>
                <li><a href="login.php">ENTRAR</a></li>
            </ul>
        </nav>
    </div>
</header>
<div class="menu_mobile">
    <ul class="menu_links_mobile" style="display: none;">
        <a href="index.php">
            <li>INÍCIO</li>
        </a>
        <a href="login.php">
            <li>ENTRAR</li>
        </a>
    </ul>
</div>
<script type="text/javascript">
    window.onload = function () {
        document.querySelector(".btn_mobile").addEventListener("click", function () {
            if (document.querySelector(".menu_links_mobile").style.display == 'none') {
                document.querySelector(".menu_links_mobile").style.display = 'block';
            } else {
                document.querySelector(".menu_links_mobile").style.display = 'none';
            }
        })
    }
</script>
