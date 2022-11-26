<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache


/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

define('AMBIENT_VAR_DEF', 'production');

define('WP_HOME','https://www.marcascomsal.com/novo');
define('WP_SITEURL','https://www.marcascomsal.com/novo');

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'marcascomsal' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'marcascomsal' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '3KdNxuoPk5VW2EPDX8Ai' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'mysql.marcascomsal.com' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Ilhn@8Ot/(-LJZ#Ei8|e[jkf01l&@9FL7e,T]OS.9N+{wJtep8zWoL24N)]03GJ~' );
define( 'SECURE_AUTH_KEY',  'i1wb.!z4mWqmjq}(RyE3sW>Wg)[rfEzV<lvv.$<!di-Vft;vh)K)la)Wpnb!6Gf2' );
define( 'LOGGED_IN_KEY',    'Ske(yofk}{n1Y.[+hk6+LRwlz>us`7U;!{{*w[Pr9nk.;b ~k:_* &Unf<iiZ,KI' );
define( 'NONCE_KEY',        'xy;7F;`N:w!RN01IM|v6jF$xEk0?N1)y(b2(Y*VAfMoUCA)e_i:_{d]+mS~nX-V5' );
define( 'AUTH_SALT',        '~p%b2f}RfEW?Qw:[R}DY=.Bq;AXQQ4oa%GWC6|3h2y6.;rG1b4cT6nQ]|%x*J]lb' );
define( 'SECURE_AUTH_SALT', 'ayB81{Wvcd4z1zQ$?:}LmejTJ|,(7wn=YqcZ-]Y7STq3MG3fHuu~Gx!RX`F7ZXAl' );
define( 'LOGGED_IN_SALT',   'TzrtsCZ/#h:<JKT+C7+?T@`tx# vzf&E:8./4H!|L3(,cvL[]!q+Q9?l,7_UAe*q' );
define( 'NONCE_SALT',       '(XF##ZqFeF4FTr<hiVKAVu{m4CR%c.-$Oz()ibrVxi5gl]<Om9Ghb_?jV}Ym9Dqu' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wpmcs_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
