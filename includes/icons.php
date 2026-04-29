<?php
function render_icon(string $name): void
{
    $icons = [
        'i-gear' => '<svg viewBox="0 0 48 48" aria-hidden="true"><path d="M20 4h8l2 6 5 2 6-3 4 7-5 4v6l5 4-4 7-6-3-5 2-2 6h-8l-2-6-5-2-6 3-4-7 5-4v-6l-5-4 4-7 6 3 5-2 2-6Zm4 14a6 6 0 1 0 0 12 6 6 0 0 0 0-12Z"/></svg>',
        'i-crane' => '<svg viewBox="0 0 48 48" aria-hidden="true"><path d="M8 42h18v-4h-6V16h14l4 8h-8v4h14l-8-16H20V8h-8v4h4v26H8v4Zm20-26v4h-8v-4h8Zm8 12 4 4 4-4-4-4-4 4Z"/></svg>',
        'i-water' => '<svg viewBox="0 0 48 48" aria-hidden="true"><path d="M24 4C16 14 12 21 12 28a12 12 0 0 0 24 0C36 21 32 14 24 4Zm-7 24h4a5 5 0 0 0 5 5v4a9 9 0 0 1-9-9Z"/></svg>',
        'i-plan' => '<svg viewBox="0 0 48 48" aria-hidden="true"><path d="M10 6h28v36H10V6Zm6 8v4h16v-4H16Zm0 9v4h16v-4H16Zm0 9v4h10v-4H16Zm18 0h-4v4h4v-4Z"/></svg>',
        'i-team' => '<svg viewBox="0 0 48 48" aria-hidden="true"><path d="M18 22a8 8 0 1 1 0-16 8 8 0 0 1 0 16Zm12-2a7 7 0 1 0 0-14 10 10 0 0 1 0 14ZM4 42c1-10 7-16 14-16s13 6 14 16H4Zm26-16c6 1 12 6 14 16h-8c-.5-6-2.5-11-6-16Z"/></svg>',
        'i-ethics' => '<svg viewBox="0 0 48 48" aria-hidden="true"><path d="M24 4 8 10v12c0 10 7 18 16 22 9-4 16-12 16-22V10L24 4Zm-2 28-8-8 3-3 5 5 10-11 3 3-13 14Z"/></svg>',
        'i-clock' => '<svg viewBox="0 0 48 48" aria-hidden="true"><path d="M24 4a20 20 0 1 0 0 40 20 20 0 0 0 0-40Zm2 10v10l8 5-2 4-10-6V14h4Z"/></svg>',
        'i-network' => '<svg viewBox="0 0 48 48" aria-hidden="true"><path d="M10 8a6 6 0 0 1 6 6c0 1-.2 2-.7 2.8l6 5.1c.8-.6 1.7-.9 2.7-.9s1.9.3 2.7.9l6-5.1A6 6 0 1 1 36 20l-6.7 5.7c.4 1 .4 1.6 0 2.6L36 34a6 6 0 1 1-3.3 3.2l-6-5.1c-.8.6-1.7.9-2.7.9s-1.9-.3-2.7-.9l-6 5.1A6 6 0 1 1 12 34l6.7-5.7a5.5 5.5 0 0 1 0-2.6L12 20A6 6 0 1 1 10 8Z"/></svg>',
        'i-projects' => '<svg viewBox="0 0 48 48" aria-hidden="true"><path d="M8 18h8l3-6h21v24H8V18Zm4 4v10h24V16H21l-3 6h-6Zm8 6 4-4 3 3 6-7 3 3-9 10-3-3-2 2-2-4Z"/></svg>',
        'i-operations' => '<svg viewBox="0 0 48 48" aria-hidden="true"><path d="M20 4h8l2 6 5 2 6-3 4 7-5 4v6l5 4-4 7-6-3-5 2-2 6h-8l-2-6-5-2-6 3-4-7 5-4v-6l-5-4 4-7 6 3 5-2 2-6Zm4 13a7 7 0 1 0 0 14 7 7 0 0 0 0-14Zm-9 5h18v4H15v-4Z"/></svg>',
        'i-engineer' => '<svg viewBox="0 0 48 48" aria-hidden="true"><path d="M17 20v-5a7 7 0 0 1 14 0v5h3v4H14v-4h3Zm4 0h6v-5a3 3 0 0 0-6 0v5Zm-9 24c1-10 6-16 12-16s11 6 12 16H12Zm22-22 3 2 3-2 2 4-3 2v4l3 2-2 4-3-2-3 2-2-4 3-2v-4l-3-2 2-4Z"/></svg>',
        'i-check' => '<svg viewBox="0 0 48 48" aria-hidden="true"><path d="M10 8h28v32H10V8Zm4 4v24h20V12H14Zm5 11 4 5 9-12 4 3-13 17-8-10 4-3Z"/></svg>',
    ];

    echo $icons[$name] ?? $icons['i-gear'];
}
?>
