<?php
	function get_param($name, $default) {
		if (isset($_GET[$name]))
			return urldecode($_GET[$name]);
		else
			return $default;
	}
	function add_param(&$url, $name, $value) {
		$sep = strpos($url, '?') !== false ? '&' : '?';
		$url .= $sep . $name . "=" . urlencode($value);
		return $url;

	}
	function content($val) {
		echo t($val);
	}

	function languages($language) {
		$languages = array('de','fr', 'en');
		$urlBase = $_SERVER['PHP_SELF'];
		foreach( $languages as $lang ) {
			$url = $urlBase;
			$class = $language == $lang ? 'active' : 'inactive';
			echo "<a  href=\"".add_param($url,'lang', $lang)."\">".strtoupper($lang)."</a>";
		}
	}

	function t($key) {
		global $language;
		$texts = array(
        'url' => array(
          'de' => 'lang=de',
          'fr' => 'lang=fr',
          'en' => 'lang=en'
        ),
				'page' => array(
						'de'=>'Seite',
						'fr'=>'Page',
						'en'=>'Page'
				),
				'content' => array(
						'de'=>'Willkommen auf der Beer All Day Long Webshop ',
						'fr'=>'Bienvenue au Beer All Day Long Webshop ',
						'en'=>'Welcome to the Beer All Day Long Webshop '
        ),
        'button' => array(
            'de' => 'Beim Produkten!',
            'fr' => 'Aux Produits!',
            'en' => 'To Products!'
        ),
        'blondebeer' => array(
            'de' => 'Beim Produkten!',
            'fr' => 'Notre choix de bière blondes pour éponger votre soif!',
            'en' => 'Our choice of blonde beers to repel your thirst!'
        ),
				'darkbeer' => array(
            'de' => 'Beim Produkten!',
            'fr' => 'Nos bières foncées pour apprécier un peu d`amertume!',
            'en' => 'Our dark beers to enjoy some bitterness!'
        ),
				'fruitbeer' => array(
            'de' => 'Beim Produkten!',
            'fr' => 'Un choix de bière fruitée pour les plus fins palais!',
            'en' => 'A choice of fruit beers for the fine taster!'
        ),
				'ipabeer' => array(
            'de' => 'Beim Produkten!',
            'fr' => 'Notre choix d`IPA, bières plus amères et douces en même temps!',
            'en' => 'Our choice of IPA, a beer bitter and smooth at the same time!'
        ),
				'specialbeer' => array(
            'de' => 'Beim Produkten!',
            'fr' => 'Un lot de bière spécial, au gingembre, citrouille et autre!',
            'en' => 'Some strange one, ginger, pumpkin and others!'
        ),
				'whitebeer' => array(
            'de' => 'Beim Produkten!',
            'fr' => 'Des bières blances douces et sucrés!',
            'en' => 'White beer! Fresh and sweet!'
        ),
				'cart' => array(
            'de' => 'Warenkorb',
            'fr' => "Panier d'achats",
            'en' => 'Cart'
        ),
				'about' => array(
            'de' => 'Über uns',
            'fr' => 'A propos de nous',
            'en' => 'About us'
        ),
				'policy' => array(
            'de' => 'Politik',
            'fr' => 'Politique',
            'en' => 'Policy'
        ),
				'contact' => array(
            'de' => 'Kontakt',
            'fr' => 'Contact',
            'en' => 'Contact'
        )

		);
		if (isset($texts[$key][$language])) {
			return $texts[$key][$language];
		} else {
			return "[$key]";
		}
	}

	$language = get_param('lang', 'en');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
				<script src="../javascript/sliding_menu.js"></script>
        <meta charset="utf-8" />
        <title>Beer All Day Long</title>
        <link rel="stylesheet" type="text/css"
        media="screen" href="../css/styleq.css" />
				<style>

					.sidenav {
    			height: 100%;
    			width: 0;
    			position: fixed;
    			z-index: 1;
    			top:0;
    			left: 0;
    			background-color: #111;
    			overflow-x: hidden;
    			transition: 0.5s;
    			padding-top: 60px;
					}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 200px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
    </head>

    <body>
			<div id="mySidenav" class="sidenav">
  			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				<?php
					$url = "cart.php";
					echo "<a href=\"".add_param($url,'lang',$_GET['lang'])."\">".t('cart')."</a>" ;?>
  			<?php
					$url = "about.php";
					echo "<a href=\"".add_param($url,'lang',$_GET['lang'])."\">".t('about')."</a>" ;?>
				<?php
					$url = "policy.php";
					echo "<a href=\"".add_param($url,'lang',$_GET['lang'])."\">".t('policy')."</a>" ;?>
					<?php
						$url = "contact.php";
						echo "<a href=\"".add_param($url,'lang',$_GET['lang'])."\">".t('contact')."</a>" ;?>
				<div><?php languages($language); ?></div>
			</div>

      <nav>
				<span>
					<span style="font-size:30px;cursor:pointer;position:relative;" onclick="openNav()">&#9776; <?php content('content'); ?>
					</span>
				</span>
    	</nav>
      <main>

    	</main>
          <div class="container">
            <img src="../images/types/blonde.jpg" alt="blonde" class="image" style="width:100%">
            <div class="middle">
              <div class="img_descr_text"><?php content('blondebeer'); ?></div>
            	<div class="img_descr_text"><?php
								$url = "products.php?type=Blonde";
								echo "<a href=\"".add_param($url,"lang",$_GET['lang'])."\" class='descr_link'>" , content('button'); ?>
								</a></div>
            </div>
          </div>
          <div class="container">
            <img src="../images/types/dark.jpg" alt="dark" class="image" style="width:100%">
            <div class="middle">
              <div class="img_descr_text"><?php content('darkbeer'); ?></div>
							<div class="img_descr_text"><?php
								$url = "products.php?type=Dark";
								echo "<a href=\"".add_param($url,"lang",$_GET['lang'])."\" class='descr_link'>" , content('button'); ?>
								</a></div>
            </div>
          </div>
          <div class="container">
            <img src="../images/types/fruit.jpg" alt="fruit" class="image" style="width:100%" >
            <div class="middle">
              <div class="img_descr_text"><?php content('fruitbeer'); ?></div>
							<div class="img_descr_text"><?php
								$url = "products.php?type=Fruit";
								echo "<a href=\"".add_param($url,"lang",$_GET['lang'])."\" class='descr_link'>" , content('button'); ?>
								</a></div>
            </div>
          </div>
          <div class="container">
            <img src="../images/types/ipa.jpg" alt="ipa" class="image" style="width:100%" >
            <div class="middle">
              <div class="img_descr_text"><?php content('ipabeer'); ?></div>
							<div class="img_descr_text"><?php
								$url = "products.php?type=IPA";
								echo "<a href=\"".add_param($url,"lang",$_GET['lang'])."\" class='descr_link'>" , content('button'); ?>
								</a></div>
            </div>
          </div>
          <div class="container">
            <img src="../images/types/special.jpg" alt="special" class="image" style="width:100%" >
            <div class="middle">
              <div class="img_descr_text"><?php content('specialbeer'); ?></div>
							<div class="img_descr_text"><?php
								$url = "products.php?type=Special";
								echo "<a href=\"".add_param($url,"lang",$_GET['lang'])."\" class='descr_link'>" , content('button'); ?>
								</a></div>
            </div>
          </div>
          <div class="container">
            <img src="../images/types/white.jpg" alt="white" class="image" style="width:100%">
            <div class="middle">
              <div class="img_descr_text"><?php content('whitebeer'); ?></div>
							<div class="img_descr_text"><?php
								$url = "products.php?type=White";
								echo "<a href=\"".add_param($url,"lang",$_GET['lang'])."\" class='descr_link'>" , content('button'); ?>
								</a></div>
            </div>
          </div>


    </body>
</html>
