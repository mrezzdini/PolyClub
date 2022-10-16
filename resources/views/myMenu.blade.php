

    

@foreach ($items as $item)

    @php

        $originalItem = $item;

        $isActive = null;
        $styles = null;
        $icon = null;

        // Background Color or Color
        if (isset($options->color) && $options->color == true) {
            $styles = 'color:'.$item->color;
        }
        if (isset($options->background) && $options->background == true) {
            $styles = 'background-color:'.$item->color;
        }

        // Check if link is current
        if(url($item->link()) == url()->current()){
            $isActive = 'current-list-item';
        }

        // Set Icon
        if(isset($options->icon) && $options->icon == true){
            $icon = '<i class="' . $item->icon_class . '"></i>';
        }

    @endphp

    <li class="{{ $isActive }}">
        
        <a href="{{ url($item->link()) }}" target="{{ $item->target }}">
            <span>{{ $item->title }} </span>
        </a>
        @if(!$originalItem->children->isEmpty())
            @include('voyager::menu.default', ['items' => $originalItem->children, 'options' => $options])
            </ul>
        @endif
    </li>
@endforeach
