<?php
function renderImageCard($image) {
    echo '<div class="col-md-4">';
    echo '  <div class="card mb-4 shadow-sm">';
    echo '    <img src="' . htmlspecialchars($image['url']) . '" class="card-img-top" alt="' . htmlspecialchars($image['title']) . '">';
    echo '    <img src="' . htmlspecialchars($image['url']) . '" class="card-img-top" alt="' . htmlspecialchars($image['title']) . '">';
    echo '    <div class="card-body">';
    echo '      <p class="card-text">' . htmlspecialchars($image['description']) . '</p>';
    echo '      <div class="d-flex justify-content-between align-items-center">';
    echo '        <div class="btn-group">';
    echo '          <button type="button" class="btn btn-sm btn-outline-light">View</button>';
    echo '          <button type="button" class="btn btn-sm btn-outline-light">Buy</button>';
    echo '        </div>';
    echo '        <small class="text-muted">9 mins</small>';
    echo '      </div>';
    echo '    </div>';
    echo '  </div>';
    echo '</div>';
}