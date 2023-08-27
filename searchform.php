<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label for="search">Search:</label><br>

  <input type="hidden" name = "cat" value ="4,6">
  <input type="text" id="s" name="s" value="<?php the_search_query(); ?>" required><br>

  <button type="submit"> Submit! </button>
</form>
