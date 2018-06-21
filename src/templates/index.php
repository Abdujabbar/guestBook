<hr />

<div class="row">
    <div class="col-md-12">
        <?php if( ($message = Session::getInstance()->getFlash('success')) ):?>
            <div class="alert alert-success" role="alert">
                <?php echo $message;?>
            </div>
        <?php endif;?>
        <h3>Guest Book List</h3>
        <hr />
        <!-- Button trigger modal -->
        <a href="/create" class="btn btn-primary" >
            New Post
        </a>
        <hr />
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">author</th>
                    <th scope="col">title</th>
                    <th scope="col">image</th>
                    <th scope="col">content</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($items)):?>
                <?php foreach($items as $item): ?>
                <tr>
                    <td scope="row"><?php echo $item->id?></td>
                    <td><?php echo htmlspecialchars($item->author)?></td>
                    <td><?php echo htmlspecialchars($item->title)?></td>
                    <td><a href="<?php echo str_replace( PUBLIC_PATH, '', MEDIA_PATH) . DIRECTORY_SEPARATOR . htmlspecialchars($item->image)?>"><?php echo htmlspecialchars($item->image)?></a></td>
                    <td><?php echo htmlspecialchars($item->content)?></td>
                </tr>
                <?php endforeach;?>
                <?php else:?>
                <tr>
                    <td scope="row" colspan="5"><?php echo "There is no items for render"?></td>
                </tr>
                <?php endif?>
            </tbody>
            <tfoot>
                <tr>
                    <td class="col" colspan="4">Total Items</td>
                    <td class="col" colspan="4"><?php echo $paginator->getTotal();?></td>
                </tr>
            </tfoot>
        </table>
        <?php echo $paginator->render();?>
    </div>
</div>
