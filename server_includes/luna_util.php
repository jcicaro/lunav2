<?php

    class Luna_Util {

        public function fetch_post_background_image_style() {
            // $post = the_post();
            $att_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
            if ($att_url) {
                $style = 'style="background-image: url(' . $att_url . ');';
                // $style .= 'background-size: cover; background-repeat: no-repeat; background-position: center;';
                $style .= '"';
                return $style;
            }
            else {
                return 'null';
            }
        }

        public function fetch_author_gravatar_src() {
            $get_author_id = get_the_author_meta('ID');
            $get_author_gravatar_url = get_avatar_url($get_author_id, array());
            $default_src = 'http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg';

            if ($get_author_gravatar) {
                return $get_author_gravatar_url;
            }
            else {
                return $default_src;
            }
        }

    }