<article class="col-12 bg-white" style="min-height: 180px; max-height: 180px;">
    <div class="col text-center">
        <h5 class="font-weight-bold pl-2">{{ $name }}</h5>
    </div>
    
    <?php $keys = array_keys($contents); ?>
    <div class="container-fluid" style="min-height: 80px; max-height: 80px;">
        <div class="row">
            <p class="col keepOneLine">
                @if (isset($keys[0])) 
                    {{ $keys[0] ?? '' }} 
                @endif
            </p>
            <p class="col keepOneLine {{ $align ?? '' }} ">
                @if (isset($keys[0]))
                    {{ $contents[$keys[0]] ?? '' }}
                @endif
            </p>
        </div>
        <div class="row">
            <p class="col keepOneLine">
                @if (isset($keys[1])) 
                    {{ $keys[1] ?? '' }} 
                @endif
            </p>
            <p class="col keepOneLine {{ $align ?? '' }} ">
                @if (isset($keys[1]))
                    {{ $contents[$keys[1]] ?? '' }}
                @endif
            </p>
        </div>
    </div>

    <div class="col text-center">
        <a href="{{ $url }}" class="btnSubmit text-white">変更</a>
    </div>
</article>
