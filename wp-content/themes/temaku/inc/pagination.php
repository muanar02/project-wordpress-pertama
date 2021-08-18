<?php
function pagination($pages = '', $range = 2) {  
    $showitems = ($range * 2)+1;  

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }   

    $output = "";
    if(1 != $pages) {
        $output .= "<div class='pt-3'>
                    <nav aria-label='Page navigation example'>
                    <ul class='pagination justify-content-center'>";

        if($paged > 1 && $pages > 1) {
            $output .= "<li class='page-item'>
                            <a class='page-link' href='".get_pagenum_link($paged - 1)."' tabindex='-1' aria-disabled='true'>Previous</a>
                        </li>";
        } else {
            $output .= "<li class='page-item disabled'>
                            <a class='page-link' href='#' tabindex='-1' aria-disabled='true'>Previous</a>
                        </li>";
        }

        for ($i=1; $i <= $pages; $i++) {
           if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
               if($paged == $i) {
                    $output .= "<li class='page-item disabled'><a class='page-link' href='#'>$i</a></li>";
               } else {
                    $output .= "<li class='page-item'><a class='page-link' href='".get_pagenum_link($i)."'>$i</a></li>";
               }
               
               
           }
       }

        if($paged < $pages && $pages > 1) {
            $output .= "<li class='page-item'>
                            <a class='page-link' href='".get_pagenum_link($paged + 1)."' tabindex='+1' aria-disabled='true'>Next</a>
                        </li>";
        } else {
            $output .= "<li class='page-item disabled'>
                            <a class='page-link' href='#'>Next</a>
                        </li>";
        }

        $output .= "</ul>
                    </nav>
                    </div>";

        echo $output;
        
    }
}

?>