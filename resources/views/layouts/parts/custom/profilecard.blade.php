<article class="col-12 bg-white" style="min-height: 277px; min-width: 364px; border:1px solid #ffd800">
    <div id="profilecard">
        <p id="title">{{ $name }}</p>
        
        <?php $keys = array_keys($contents); ?>
        <div class="container-fluid" style="min-height:120px">
            @if (isset($keys[0])) 
            <div class="row" style="margin-top:12px; border-bottom:1px solid #dbdbdb">
                <p class="col keepOneLine" id="caption" style="color: #777777;">
                    {{ $keys[0] ?? '' }} 
                </p>
                <p class="col keepOneLine {{ $align ?? 'text-right' }} " id="caption" style="color: black;">
                    {{ $contents[$keys[0]] ?? '' }}
                </p>
            </div>
            @endif

            @if (isset($keys[1])) 
            <div class="row" style="margin-top:12px; border-bottom:1px solid #dbdbdb">
                <p class="col keepOneLine" id="caption" style="color: #777777;">
                    {{ $keys[1] ?? '' }} 
                </p>
                <p class="col keepOneLine {{ $align ?? 'text-right' }} " id="caption" style="color: black;">
                    {{ $contents[$keys[1]] ?? '' }}
                </p>
            </div>
            @endif
            
        </div>

        <div class="col text-center">
            <a href="{{ $url }}" class="btn yellow-btn-304-50 text-dark">変更</a>
        </div>
    </div>
</article>
