<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form action="?action=save-artifact" enctype="multipart/form-data" method="POST" class="create-artifact">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input class="form-control" placeholder="Enter title" id="title" name="artifact[title]" required>
                </div>
                <div class="form-group">
                    <label for="attributes">Attributes:</label>
                    <input class="form-control" placeholder="e.g. Armor:670;Movement Speed:-5%" id="attributes" name="artifact[attributes]" required>
                </div>
                <div class="form-group">
                    <label for="modifiers">Modifiers:</label>
                    <textarea class="form-control"
                              placeholder="-10% to Fire Resistance&#10;-20% to Lightning Resistance&#10;+25% to Cold Resistance"
                              id="modifiers"
                              name="artifact[modifiers]"
                              required>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" placeholder="Enter description" id="description" name="artifact[description]" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control" placeholder="Enter price" id="price" name="artifact[price]" required>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" accept="image/png, image/jpeg" class="form-control" id="image" name="artifact[image]">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>