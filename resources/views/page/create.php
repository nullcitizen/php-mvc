<?php $this->layout('template', ['data'=>['title'=>'Create Page']]) ?>

<form action="/page" method="post">
    <div class="form-group">
        <label for="title">Page Title</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="description">Page Description:</label>
        <textarea id="description" name="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="slug">URL Slug:</label>
        <input type="text" name="slug" id="slug" class="form-control">
    </div>
    <div class="form-group">
        <label for="content">Content:</label>
        <textarea id="content" name="content" class="form-control" rows="5" placeholder="Markdown Syntax"></textarea>
    </div>
    <input class="btn btn-default" type="submit" value="Submit">
</form>
