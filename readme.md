## Able Player for WordPress

[Able Player](https://github.com/ableplayer/ableplayer) is a fully accessible cross-browser HTML5 media player. With an easy to use shortcode, this plugin gives you the ability to include audio or video wrapped in an accessible player in any post or page. This will enhance the user experience of visitors who rely on screen readers and keyboards (or other non-mouse input devices).

## Installation

The plugin is available from [WordPress.org's plugin directory](https://wordpress.org/plugins/wp-able-player/). The github repository is for development.

## Usage

**Example Video:**
```
// video only
[able_player src="https://example.afk/sample.mp4"]

// video with captions and chapters
[able_player src="https://example.afk/sample.mp4" captions="https://example.afk/caps.vtt" chapters="https://example.afk/chaps.vtt"]
```

**Example Audio:**
```
[able_player src="https://example.afk/sample.wav"]
[able_player src="https://example.afk/sample.ogg" ogg_type="audio"]
```

The following file types are currently supported by Able Player:

&nbsp;&nbsp;&nbsp;&nbsp;*Video*: webm, webmv, mp4, ogg*, ogv

&nbsp;&nbsp;&nbsp;&nbsp;*Audio*: mp3, ogg*, oga, wav

\* requires the inclusion of an additional parameter/attribute in the shortcode: `ogg_type = [audio|video]`.

____

v 1.0

Damion Armentrout, &copy; 2017 ([GPLv2 License](http://www.gnu.org/licenses/license-list.html#GPLCompatibleLicenses) or later).


Able Player is &copy; 2014 University of Washington (MIT License). The author of this plugin is not associated with Able Player or UW.