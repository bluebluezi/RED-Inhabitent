<form role="search" method="get" action="<?php echo home_url('/')?>">
        <fieldset>
            <a href="#" class="search-toggle">
                <i class="fas fa-search fa-1x"></i>
            </a>
            <label>
                <input placeholder = "Type and hit enter" type="search" name="s" val="<?php echo esc_attr(get_search_query());?>"/>
            </label>
            <input type ="submit" id="search-submit" value="<?php echo esc_attr('Search')?>"/>
        </fieldset>
</form>