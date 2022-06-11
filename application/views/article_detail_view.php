<?php if (($results)) : ?>
    <?php foreach ($results as $row) : ?>
        <div class="container">
            <br>
            <h1 class="text-center"><?php echo $row->title ?></h1>
            <br>
            <p><?php echo $this->typography->nl2br_except_pre($row->description); ?></p>
            <?php if ($row->author_id == $this->session->userdata('user_id')) : ?>
                <a href="<?php echo base_url() . "articles/edit/" . $row->article_id; ?>" class="btn btn-primary btn-sm"> <i class="material-icons">edit</i>Edit</a>
                <a href="<?php echo base_url() . "articles/delete/" . $row->article_id; ?>" class="btn btn-danger btn-sm"> <i class="material-icons">delete</i>Delete</a>
            <?php else : ?>
                <p class="alert alert-danger text-center" style="width: 50%;">Please login as the author of this article to edit/delete this article.</p>
            <?php endif ?>
            <p class="alert alert-info mt-3 text-center" style="width: 50%;">Article written by <b><?php echo $row->username ?></b> on <b><?php $date = $row->timedate;
                                                                                                                                            $newdate = date("F d, Y g:ia", strtotime($date));
                                                                                                                                            echo $newdate ?></b></p>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <p>No results</p>
<?php endif; ?>