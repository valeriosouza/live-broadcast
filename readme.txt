=== Live Broadcast ===
Contributors: valeriosza, rafaelfunchal
Donate link: 
Tags: live, streaming, Blogging, Broadcast, post, posts
Requires at least: 3.0
Tested up to: 3.6
Stable tag: 0.1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easy streaming live for WordPress

== Description ==

This Plugin for streaming live in Text for WordPress

== Descrição ==

Este Plugin permite fazer uma transmissão ao-vivo no seu WordPress

== Installation ==

1. Upload the `LiveBroadcast` directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Use the shortcode [live_broadcast] in your posts and pages. To enter directly in programming, use 'echo do_shortcode('[live_broadcast]'); '
1. Start posting content through the menu Live Broadcast


== Instalação ==
1. Faça o upload do `LiveBroadcast` para a pasta `/wp-content/plugins/`
1. Ative o plugin atravês da opção Plugins do Menu do seu WordPress
1. Para usar basta usar o Shortcode [live_broadcast] em seus posts ou páginas. Para inserir diretamente na programação, use o código 'echo do_shortcode('[live_broadcast]'); '
1. Comece a postagem de contéudo atravês da opção Transmissão Ao-Vivo do seu WordPress.


= Contribute =

Use https://github.com/valeriosouza/live-broadcast for contribute

= Colaborar =

Para colaborar, use o https://github.com/valeriosouza/live-broadcast .



== Frequently Asked Questions ==

= How to verify that the plugin is active? / Como verificar se o plugin está ativo? =

Use in your code / Use no seu código

		'if (function_exists('create_shortcode_live_broadcast')){
			echo do_shortcode('[live_broadcast]'); '

= There is a force to change the ordering of posts? / Existe uma força de mudar a ordenação de posts? =

Just implement the options in the shortcode as below. / Basta implementar as opções no shortcode como abaixo.
	
		'[live_broadcast orderby="title" order="ASC"]'
	
	
== Upgrade Notice ==

Options for order and languagem pt-BR


== Screenshots ==

1. Post screen live / Tela de postagem 

== Changelog ==

= 0.1.2 - 25/07/2013 =

* Inclusion of ordering option Posts and Translation for pt-BR
* Fixed issue when post was saved
* Fix the problem of locating the shortcode

= 0.1.1 - 24/07/2013 =

* New Version with improved code.

= 0.1.0 - 23/07/2013 =

* Lançada primeira versão beta

== License ==

Live Broadcast is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

Live Broadcast is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with Notify Users E-Mail. If not, see <http://www.gnu.org/licenses/>.
