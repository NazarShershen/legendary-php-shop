<div class="infobox-page-container">
    <div class="item-box unique">
        <div class="header double">
           {!! $item->title  !!}
        </div>
        <div class="item-stats">
            <div class="group">
                @foreach($item->attributes as $attr)
                    <div>
                        <span class="default">{{ $attr['name'] }} :&nbsp;</span>
                        <span class="tc value">{{ $attr['value'] }} </span>
                    </div>
                @endforeach
            </div>

            <ul class="group tc mod">
                @foreach ($item->modifiers as $modifier)
                    <li> {{  $modifier }} </li>
                @endforeach
            </ul>
            <div class="group tc flavour">
                {!! $item->description !!}
            </div>
        </div>
        <div class="group">
            <span>Price:&nbsp;</span>
            <span class="price">{{ $item->price }} Schmeckles</span>
        </div>
        <div class="group artifact-image">
            <img src="{{ $item->getImageUrl() }}" alt="{{ $item->title }}" />
        </div>
    </div>
</div>
