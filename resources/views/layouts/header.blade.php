<div class="row">
    <div class="col-md-5" align="right">
        <div class="title-category">Categories</div>
        <select name="category" id="select-category">
            <option value="">Choose category</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-5" align="center">
        <div>Modifications</div>
        <select name="modification" id="select-modification">
            <option value="">Choose modification</option>
            @foreach($modifications as $modification)
                <option value="{{$modification->id}}">{{$modification->name}}</option>
            @endforeach
        </select>
    </div>
</div>