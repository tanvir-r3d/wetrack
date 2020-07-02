/*=========================================================================================
	File Name: form-text-editor.js
	Description: Quill is a modern rich text editor built for compatibility and extensibility.
	----------------------------------------------------------------------------------------
  Item Name: Stack - Responsive Admin Theme
	Author: Pixinvent
	Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
(function (window, document, $) {
  "use strict";

  var Font = Quill.import("formats/font");
  Font.whitelist = ["sofia", "slabo", "roboto", "inconsolata", "ubuntu"];
  Quill.register(Font, true);
  // bubble editor
  var bubbleEditor = new Quill("#bubble-container .editor", {
    bounds: "#bubble-container .editor",
    modules: {
      formula: true,
      syntax: true
    },
    theme: "bubble"
  });
  // snow editor
  var snowEditor = new Quill("#snow-container .editor", {
    bounds: "#snow-container .editor",
    modules: {
      formula: true,
      syntax: true,
      toolbar: "#snow-container .quill-toolbar"
    },
    theme: "snow"
  });
  // full editor
  var fullEditor = new Quill("#full-container .editor", {
    bounds: "#full-container .editor",
    modules: {
      formula: true,
      syntax: true,
      toolbar: [
        [{
            font: []
          },
          {
            size: []
          }
        ],
        ["bold", "italic", "underline", "strike"],
        [{
            color: []
          },
          {
            background: []
          }
        ],
        [{
            script: "super"
          },
          {
            script: "sub"
          }
        ],
        [{
            header: "1"
          },
          {
            header: "2"
          },
          "blockquote",
          "code-block"
        ],
        [{
            list: "ordered"
          },
          {
            list: "bullet"
          },
          {
            indent: "-1"
          },
          {
            indent: "+1"
          }
        ],
        [
          "direction",
          {
            align: []
          }
        ],
        ["link", "image", "video", "formula"],
        ["clean"]
      ]
    },
    theme: "snow"
  });

})(window, document, jQuery);