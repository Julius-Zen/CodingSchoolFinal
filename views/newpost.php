<div class="a">
    <div class="newpost">
        <form method="post" enctype="multipart/form-data">
            <h3>New post</h3>
            <span>
                <?php echo $validation["name"] ?? "" ?>
            </span>
            <input class="tittle" type="text" name="name" placeholder="Tittle" value="<?php $edit['name'] ?? ''?>">
            <span>
                <?php echo $validation["content"] ?? "" ?>
            </span>
            <textarea id="content" name="content" placeholder="Content" ></textarea>

            
                <input class="feature" 
                    id="feature" 
                    type="checkbox" 
                    name="feature"
                    value="1"
                >
                <label for="feature">Feature your post</label>
           

            <input class="image" type="file" name="image" />
        
            <button type="submit" name="new-content">Publish your post</button>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#content').richText({
            imageUpload: false,
            fileUpload: false,
            videoEmbed: false,
        });
    });
</script>