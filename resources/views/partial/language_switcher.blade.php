

<div class="lang-selection-container" id="lang-switcher">
    <div data-uia="language-picker-header+container" class="ui-select-wrapper">
        <div class="select-arrow medium prefix globe">
            <select onchange="location = this.value;" data-uia="language-picker-header" class="ui-select medium" id="lang-switcher-header-select" tabindex="0" placeholder="lang-switcher">
                @foreach($available_locales as $locale_name => $available_locale)
                    @if($available_locale === $current_locale)
                        <option selected=""><i class='us flag'></i>{{ $locale_name }}</option>
                    @else
                        <option value="{{ URL('language/'.$available_locale )}}">{{$locale_name}}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
</div>
