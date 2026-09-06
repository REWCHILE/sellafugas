<style>
/* Critical Above-the-Fold CSS for Zero Render Delay and Zero CLS */
*,::before,::after{box-sizing:border-box;border-width:0;border-style:solid;margin:0;padding:0}
html{line-height:1.5;-webkit-text-size-adjust:100%;tab-size:4;font-family:'Manrope',system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,sans-serif;-webkit-tap-highlight-color:transparent;direction:ltr}
body{margin:0;line-height:inherit;font-family:'Manrope',system-ui,-apple-system,sans-serif;background-color:#020617;color:#f1f5f9;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}
[x-cloak]{display:none!important}
@font-face{font-family:'Manrope';font-style:normal;font-weight:400 800;font-display:optional;src:url('/fonts/manrope.woff2') format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}
@font-face{font-family:'Plus Jakarta Sans';font-style:normal;font-weight:300 800;font-display:optional;src:url('/fonts/plus-jakarta-sans.woff2') format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}
.font-display,h1,h2,h3{font-family:'Plus Jakarta Sans',system-ui,-apple-system,sans-serif}
.font-sans{font-family:'Manrope',system-ui,-apple-system,sans-serif}
.relative{position:relative}.absolute{position:absolute}.sticky{position:sticky}.fixed{position:fixed}
.inset-0{top:0;right:0;bottom:0;left:0}.top-0{top:0}.top-\[41px\]{top:41px}.-z-10{z-index:-10}.-z-20{z-index:-20}.z-10{z-index:10}.z-40{z-index:40}.z-50{z-index:50}
.block{display:block}.inline{display:inline}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.hidden{display:none}
.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}.grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}
.items-center{align-items:center}.justify-between{justify-content:space-between}.flex-wrap{flex-wrap:wrap}
.w-full{width:100%}.w-auto{width:auto}.h-full{height:100%}
.w-3{width:0.75rem}.h-3{height:0.75rem}.w-3\.5{width:0.875rem}.h-3\.5{height:0.875rem}.w-4{width:1rem}.h-4{height:1rem}.w-6{width:1.5rem}.h-6{height:1.5rem}
.h-12{height:3rem}.h-14{height:3.5rem}.h-20{height:5rem}
.max-w-7xl{max-width:80rem}.mx-auto{margin-left:auto;margin-right:auto}
.px-4{padding-left:1rem;padding-right:1rem}.py-1\.5{padding-top:0.375rem;padding-bottom:0.375rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.py-2\.5{padding-top:0.625rem;padding-bottom:0.625rem}
.pt-2{padding-top:0.5rem}.pt-12{padding-top:3rem}.pb-5{padding-bottom:1.25rem}.pb-20{padding-bottom:5rem}
.p-1{padding:0.25rem}.p-4{padding:1rem}
.gap-1\.5{gap:0.375rem}.gap-2{gap:0.5rem}.gap-2\.5{gap:0.625rem}.gap-3\.5{gap:0.875rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.gap-12{gap:3rem}
.space-y-7>:not([hidden])~:not([hidden]){margin-top:1.75rem}
.bg-slate-950{background-color:#020617}.bg-slate-900{background-color:#0f172a}.bg-slate-900\/95{background-color:rgba(15,23,42,0.95)}
.bg-emerald-500{background-color:#10b981}.bg-emerald-400{background-color:#34d399}
.bg-gradient-to-r{background-image:linear-gradient(to right,var(--tw-gradient-stops))}
.from-emerald-950{--tw-gradient-from:#022c22;--tw-gradient-stops:var(--tw-gradient-from),var(--tw-gradient-to,rgba(2,44,34,0))}
.via-slate-900{--tw-gradient-stops:var(--tw-gradient-from),#0f172a,var(--tw-gradient-to,rgba(15,23,42,0))}
.to-sky-950{--tw-gradient-to:#082f49}
.from-sky-400{--tw-gradient-from:#38bdf8;--tw-gradient-stops:var(--tw-gradient-from),var(--tw-gradient-to,rgba(56,189,248,0))}
.via-cyan-300{--tw-gradient-stops:var(--tw-gradient-from),#67e8f9,var(--tw-gradient-to,rgba(103,232,249,0))}
.to-emerald-400{--tw-gradient-to:#34d399}
.from-slate-950\/90{--tw-gradient-from:rgba(2,6,23,0.9);--tw-gradient-stops:var(--tw-gradient-from),var(--tw-gradient-to,rgba(2,6,23,0))}
.via-slate-950\/60{--tw-gradient-stops:var(--tw-gradient-from),rgba(2,6,23,0.6),var(--tw-gradient-to,rgba(2,6,23,0))}
.to-slate-950\/35{--tw-gradient-to:rgba(2,6,23,0.35)}
.from-slate-950{--tw-gradient-from:#020617;--tw-gradient-stops:var(--tw-gradient-from),var(--tw-gradient-to,rgba(2,6,23,0))}
.via-slate-950\/40{--tw-gradient-stops:var(--tw-gradient-from),rgba(2,6,23,0.4),var(--tw-gradient-to,rgba(2,6,23,0))}
.to-transparent{--tw-gradient-to:transparent}
.from-slate-950\/70{--tw-gradient-from:rgba(2,6,23,0.7);--tw-gradient-stops:var(--tw-gradient-from),var(--tw-gradient-to,rgba(2,6,23,0))}
.via-transparent{--tw-gradient-stops:var(--tw-gradient-from),transparent,var(--tw-gradient-to,transparent)}
.bg-gradient-to-t{background-image:linear-gradient(to top,var(--tw-gradient-stops))}
.bg-gradient-to-b{background-image:linear-gradient(to bottom,var(--tw-gradient-stops))}
.bg-clip-text{-webkit-background-clip:text;background-clip:text}
.text-transparent{color:transparent;-webkit-text-fill-color:transparent}
.text-white{color:#fff}.text-slate-100{color:#f1f5f9}.text-slate-200{color:#e2e8f0}.text-slate-300{color:#cbd5e1}.text-slate-950{color:#020617}
.text-emerald-300{color:#6ee7b7}.text-emerald-400{color:#34d399}.text-sky-400{color:#38bdf8}
.text-xs{font-size:0.75rem;line-height:1rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-base{font-size:1rem;line-height:1.5rem}
.text-2xl{font-size:1.5rem;line-height:2rem}.text-4xl{font-size:2.25rem;line-height:2.5rem}
.font-normal{font-weight:400}.font-medium{font-weight:500}.font-semibold{font-weight:600}.font-bold{font-weight:700}.font-extrabold{font-weight:800}.font-black{font-weight:900}
.tracking-tight{letter-spacing:-0.025em}.tracking-wider{letter-spacing:0.05em}.uppercase{text-transform:uppercase}
.leading-none{line-height:1}.leading-relaxed{line-height:1.625}.leading-\[1\.08\]{line-height:1.08}
.border{border-width:1px}.border-b{border-bottom-width:1px}
.border-emerald-500\/20{border-color:rgba(16,185,129,0.2)}.border-emerald-500\/40{border-color:rgba(16,185,129,0.4)}
.border-slate-800\/80{border-color:rgba(30,41,59,0.8)}.border-slate-700\/80{border-color:rgba(51,65,85,0.8)}
.rounded-full{border-radius:9999px}.rounded-xl{border-radius:0.75rem}.rounded-2xl{border-radius:1rem}
.overflow-hidden{overflow:hidden}.overflow-x-hidden{overflow-x:hidden}
.pointer-events-none{pointer-events:none}
.object-cover{object-fit:cover}.object-center{object-position:center}
.brightness-90{filter:brightness(.9)}.contrast-105{filter:brightness(.9) contrast(1.05)}
.glass-dark{background:linear-gradient(135deg,rgba(15,23,42,0.85) 0%,rgba(10,15,30,0.92) 100%);backdrop-filter:blur(16px);border:1px solid rgba(255,255,255,0.08);box-shadow:0 4px 24px -1px rgba(0,0,0,0.4),inset 0 1px 0 rgba(255,255,255,0.05)}
@media(min-width:640px){
.sm\:inline{display:inline}.sm\:text-sm{font-size:0.875rem;line-height:1.25rem}.sm\:text-xl{font-size:1.25rem;line-height:1.75rem}
.sm\:text-3xl{font-size:1.875rem;line-height:2.25rem}.sm\:text-6xl{font-size:3.75rem;line-height:1}
.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:grid-cols-3{grid-template-columns:repeat(3,minmax(0,1fr))}.sm\:h-14{height:3.5rem}
}
@media(min-width:1024px){
.lg\:flex{display:flex}.lg\:grid-cols-12{grid-template-columns:repeat(12,minmax(0,1fr))}.lg\:col-span-7{grid-column:span 7/span 7}
.lg\:pt-20{padding-top:5rem}.lg\:pb-28{padding-bottom:7rem}.lg\:px-8{padding-left:2rem;padding-right:2rem}.lg\:text-7xl{font-size:4.5rem;line-height:1}
}
</style>
