<h2>Image Categories</h2>
<ul id="categories-list" class="list-group">
    <?php
    foreach ($categories as &$category) {
        $category['albCount'] =count( $this->model->get_albums_byCategory($category['ID']));
    }
    foreach ($categories as &$category) {
        echo "<a href='../category/album/" . $category['ID'] . "'><li class='list-group-item'><span class='badge'>"
            .$category['albCount']."</span>" . $category['CatName'] . "</li></a>";
    }
    ?>
</ul>
