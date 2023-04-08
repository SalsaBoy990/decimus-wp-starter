<?php

final class Decimus_i18n {


    /** Load translations */
    public static function load_text_domain(string $domain, string $file_path): void
    {
        // modified slightly from https://gist.github.com/grappler/7060277#file-plugin-name-php
        $locale = apply_filters( 'plugin_locale', get_locale(), $domain );

        load_textdomain( $domain,
            trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
        load_plugin_textdomain( $domain, false, basename( dirname( $file_path, 2 ) ) . '/languages/' );
        load_plugin_textdomain( $domain, false, dirname( plugin_basename( $file_path ) ) . '/lang/' );
    }

}


