<h1>New Article</h1>
<?php echo form_open_multipart('articles/write'); ?>
<div class="form-group">
    <label for="title">Title:</label>
    <input type="text" name="title" class="form-control form-width" value="<?php echo
                                                                            set_value('title'); ?>" />
    <?php echo form_error('title'); ?>
</div>
<div class="form-group">
    <label for="description">Description:</label>
    <textarea name="description" class="form-control" style="height: 300px; width:100%; resize:none;"><?php echo
                                                                                                        set_value('description'); ?></textarea>
    <?php echo form_error('description'); ?>
</div>
<div class="form-group"><input type="submit" value="Submit" class="btn btn-primary" /></div>
</form>