<article class="col-12 bg-white profileArticle" >
    <div id="profilecard" class="mt-4">
        <p id="title">{{ $name }}</p>

        <?php $keys = array_keys($contents); ?>
        <div class="container-fluid mt-3" style="min-height:135px">
            @if (isset($keys[0]))
            <div class="row " style="border-bottom:1px solid #dbdbdb">
                <p class="col keepOneLine" id="caption" style="color: #777777;">
                    {{ $keys[0] ?? '' }}
                </p>
                <p class="col keepOneLine {{ $align ?? 'text-right' }} " id="caption" style="color: black;">
                    {{ $contents[$keys[0]] ?? '' }}
                </p>
            </div>
            @endif

            @if (isset($keys[1]))
            <div class="row mt-3" style="border-bottom:1px solid #dbdbdb">
                <p class="col keepOneLine" id="caption" style="color: #777777;">
                    {{ $keys[1] ?? '' }}
                </p>
                <p class="col keepOneLine {{ $align ?? 'text-right' }} " id="caption" style="color: black;">
                    {{ $contents[$keys[1]] ?? '' }}
                </p>
            </div>
            @endif

            @if (isset($keys[2]))
            <div class="row mt-3" style="border-bottom:1px solid #dbdbdb">
                <p class="col keepOneLine" id="caption" style="color: #777777;">
                    {{ $keys[2] ?? '' }}
                </p>
                <p class="col keepOneLine {{ $align ?? 'text-right' }} " id="caption" style="color: black;">
                    {{ $contents[$keys[2]] ?? '' }}
                </p>
            </div>
            @endif
        </div>

        <div class="col text-center mt-4">
            <a href="{{ $url }}" class="btn yellow-btn-304-50 text-dark">変更</a>
        </div>
    </div>
</article>
