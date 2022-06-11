<br>
<h1 class="text-center">Lab 7: CodeIgniter & Ion Auth</h1>
<br>
<?php if (($results)) : ?>
    <div class="container">
        <div class="row">
            <?php foreach ($results as $row) : ?>
                <div class="card col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $row->title ?></h2>
                        <p><?php echo substr($row->description, 0, 100) ?></p>
                        <a href="<?php echo base_url() . "articles/detail/" . $row->article_id; ?>" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>