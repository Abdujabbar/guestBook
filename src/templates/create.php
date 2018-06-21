<hr/>
<!-- Button trigger modal -->
<a href="/" class="btn btn-primary">
    Home
</a>
<hr/>
<br/>
<br/>
<div class="row">
    <div class="col-3"></div>
    <div class="col">
        <h3>Create New Post</h3>
        <hr/>
        <form id="post-form" action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text"
                           class="form-control"
                           id="email"
                           name="author"
                           placeholder="email@example.com"
                           value="<?php echo htmlspecialchars($post->author) ?>"/>
                    <?php echo Helpers\AlertHelper::show('danger', $post->getError('author'))?>
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title"
                           value="<?php echo htmlspecialchars($post->title) ?>"/>
                    <?php echo Helpers\AlertHelper::show('danger', $post->getError('title'))?>
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" class="image" id="image" name="image"/>
                    <?php echo Helpers\AlertHelper::show('danger', $post->getError('image'))?>
                </div>
            </div>

            <div class="form-group row">
                <label for="content" class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="content" id="content"
                              rows="3"><?php echo htmlspecialchars($post->content) ?></textarea>
                    <?php echo Helpers\AlertHelper::show('danger', $post->getError('content'))?>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>

    </div>
    <div class="col-3"></div>
</div>