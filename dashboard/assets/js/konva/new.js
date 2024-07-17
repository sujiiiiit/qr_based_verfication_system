function addrect() {
  var rect = new Konva.Rect({
    x: 250,
    y: 100,
    width: 150,
    height: 90,
    fill: "green",
    name: "rect",
    draggable: true,
  });
  layer.add(rect);
  tr.moveToTop();
  selectionRectangle.moveToTop(); // move selection rectangle to top
}

// var text = new Konva.Text({
//   x: 120,
//   y: 180,
//   text: "Select me!",
//   fontSize: 30,
//   fontFamily: "Calibri",
//   fill: "#fff",
//   name: "text",
//   draggable: true,
//   listening: true,
// });
// layer.add(text);
// tr.moveToTop();
// selectionRectangle.moveToTop(); // move selection rectangle to top

function addtxt() {
  const text = new Konva.Text({
    x: 120,
    y: 180,
    text: "Select me!",
    fontSize: 30,
    fontFamily: "Calibri",
    fill: "#000",
    name: "text",
    draggable: true,
    listening: true,
  });

  text.on("dblclick", () => {
    var textPosition = text.getAbsolutePosition();
    var stageBox = stage.container().getBoundingClientRect();

    var areaPosition = {
      x: textPosition.x,
      y: textPosition.y - text.fontSize(),
    };

    var textarea = document.createElement("textarea");
    textarea.id = "myTextarea";
    document
      .getElementById("add_txt")
      .parentNode.insertBefore(textarea, document.getElementById("add_txt"));

    textarea.value = text.text();
    textarea.style.top = areaPosition.y + "px";
    textarea.style.left = areaPosition.x + "px";
    textarea.style.width = "100%";
    textarea.style.height = text.fontSize() + "px";
    textarea.style.fontSize = text.fontSize() + "px";
    textarea.style.border = "2px solid var(--primary)";
    textarea.style.padding = "0px";
    textarea.style.margin = "0px";
    textarea.style.overflow = "hidden";
    textarea.style.background = "transparent";
    textarea.style.outline = "0";
    textarea.style.resize = "none";
    textarea.style.lineHeight = text.lineHeight();
    textarea.style.fontFamily = text.fontFamily();
    textarea.style.transformOrigin = "left top";
    textarea.style.textAlign = text.align();
    textarea.style.color = text.fill();
    var rotation = text.rotation();
    var transform = "";
    if (rotation) {
      transform += "rotateZ(" + rotation + "deg)";
    }

    var px = 0;
    var isFirefox = navigator.userAgent.toLowerCase().indexOf("firefox") > -1;
    if (isFirefox) {
      px += 2 + Math.round(text.fontSize() / 20);
    }
    transform += "translateY(-" + px + "px)";

    textarea.style.transform = transform;

    textarea.focus();

    textarea.addEventListener("keydown", function (e) {
      // hide on enter
      if (e.keyCode === 13) {
        text.text(textarea.value);
        layer.draw();
        $('#myTextarea').remove();
      }
      // hide on escape
      if (e.keyCode === 27) {
        $('#myTextarea').remove();
      }
    });
  });

  layer.add(text);
  layer.draw();
  tr.moveToTop();
  selectionRectangle.moveToTop();
}

var tr = new Konva.Transformer();
layer.add(tr);

// by default select all shapes
// tr.nodes([image]);

var selectionRectangle = new Konva.Rect({
  fill: "rgba(135, 116, 225, .1)",
  visible: false,
  stroke: "rgba(135, 116, 225, .5)",
  strokeWidth: 1,
  strokeEnabled: true,
});
layer.add(selectionRectangle);

var x1, y1, x2, y2;
stage.on("mousedown touchstart", (e) => {
  if (e.target !== stage) {
    return;
  }
  e.evt.preventDefault();
  x1 = stage.getPointerPosition().x;
  y1 = stage.getPointerPosition().y;
  x2 = stage.getPointerPosition().x;
  y2 = stage.getPointerPosition().y;

  selectionRectangle.visible(true);
  selectionRectangle.width(0);
  selectionRectangle.height(0);
});

stage.on("mousemove touchmove", (e) => {
  if (!selectionRectangle.visible()) {
    return;
  }
  e.evt.preventDefault();
  x2 = stage.getPointerPosition().x;
  y2 = stage.getPointerPosition().y;

  selectionRectangle.setAttrs({
    x: Math.min(x1, x2),
    y: Math.min(y1, y2),
    width: Math.abs(x2 - x1),
    height: Math.abs(y2 - y1),
  });
});

stage.on("mouseup touchend", (e) => {
  if (!selectionRectangle.visible()) {
    return;
  }
  e.evt.preventDefault();
  setTimeout(() => {
    selectionRectangle.visible(false);
  });

  var shapes = stage.find(".rect, .text, .image");

  var box = selectionRectangle.getClientRect();
  var selected = shapes.filter((shape) =>
    Konva.Util.haveIntersection(box, shape.getClientRect())
  );
  tr.nodes(selected);
});

stage.on("click tap", function (e) {
  if (selectionRectangle.visible()) {
    return;
  }

  if (e.target === stage) {
    tr.nodes([]);
    return;
  }
  const metaPressed = e.evt.shiftKey || e.evt.ctrlKey || e.evt.metaKey;
  const isSelected = tr.nodes().indexOf(e.target) >= 0;

  if (!metaPressed && !isSelected) {
    tr.nodes([e.target]);
  } else if (metaPressed && isSelected) {
    const nodes = tr.nodes().slice();
    nodes.splice(nodes.indexOf(e.target), 1);
    tr.nodes(nodes);
  } else if (metaPressed && !isSelected) {
    const nodes = tr.nodes().concat([e.target]);
    tr.nodes(nodes);
  }
});

$(document).ready(function () {
  $("#imgdiv img").click(function (event) {
    addimg();
  });
});

// attach a click event listener to the button with ID #imgbtn
document.getElementById("add_txt").addEventListener("click", function () {
  addtxt();
});

// add keydown event listener to the document
document.addEventListener("keydown", (e) => {
  // check if the pressed key is "Delete"
  if (e.code === "Delete") {
    // get the currently selected nodes
    var selectedNodes = tr.nodes();

    // check if there are any selected nodes
    if (selectedNodes.length > 0) {
      // loop through each selected node
      selectedNodes.forEach((node) => {
        // remove the node from the layer
        node.remove();
      });

      // clear the transformer selection
      tr.nodes([]);
      layer.draw();
    }
  }
});

var clipboard = null;

// Copy selected nodes to clipboard
document.addEventListener("keydown", (e) => {
  if (e.code === "KeyC" && (e.ctrlKey || e.metaKey)) {
    e.preventDefault();

    var selectedNodes = tr.nodes();
    clipboard = [];

    selectedNodes.forEach((node) => {
      clipboard.push(node.clone());
    });
  }
});

// Cut selected nodes to clipboard
document.addEventListener("keydown", (e) => {
  if (e.code === "KeyX" && (e.ctrlKey || e.metaKey)) {
    e.preventDefault();

    var selectedNodes = tr.nodes();
    clipboard = [];

    selectedNodes.forEach((node) => {
      clipboard.push(node.clone());
      node.remove();
    });

    tr.nodes([]);
    layer.draw();
  }
});

// Paste nodes from clipboard
document.addEventListener("keydown", (e) => {
  if (e.code === "KeyV" && (e.ctrlKey || e.metaKey)) {
    e.preventDefault();

    clipboard.forEach((node) => {
      var clone = node.clone({
        x: node.x() + 10, // shift the position by 10 pixels to avoid overlapping
        y: node.y() + 10,
      });

      layer.add(clone);
      tr.nodes([clone]);
      tr.moveToTop();
      selectionRectangle.moveToTop();
    });

    layer.draw();
  }
});
