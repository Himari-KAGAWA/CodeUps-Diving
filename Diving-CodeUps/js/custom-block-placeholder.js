"use strict";

wp.domReady(function () {
  const postType = wp.data.select("core/editor").getCurrentPostType();

  // 複数のカスタム投稿タイプとデフォルトの投稿タイプに対してプレースホルダーを設定
  if (
    postType === "campaign" ||
    postType === "voice" ||
    postType === "post"
  ) {
    let placeholderText = "";

    // 投稿タイプに応じてプレースホルダーのテキストを設定
    if (postType === "campaign") {
      placeholderText = "キャンペーンの説明を入力してください";
    } else if (postType === "voice") {
      placeholderText = "お客様の声を入力してください";
    } else if (postType === "post") {
      placeholderText = "ここに記事を書いてください"; // デフォルトの投稿タイプのプレースホルダー
    }

    // タイトルブロックのプレースホルダーを変更
    wp.data.dispatch("core/editor").editPost({ title: "" });
    const titleInput = document.querySelector(".editor-post-title__input");
    if (titleInput) {
      titleInput.setAttribute("placeholder", placeholderText);
    }
  }
});
