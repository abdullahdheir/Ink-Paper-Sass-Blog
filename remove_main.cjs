const fs = require('fs');
const path = require('path');

const viewsDir = "/Users/macbookpro2020/Work/E-Lancer/Course Project TODO's/resources/views";

function processDirectory(dir) {
    const files = fs.readdirSync(dir);
    for (const file of files) {
        const fullPath = path.join(dir, file);
        if (fs.statSync(fullPath).isDirectory()) {
            processDirectory(fullPath);
        } else if (fullPath.endsWith('.blade.php')) {
            let content = fs.readFileSync(fullPath, 'utf8');
            
            // Only process if it has @section('page-content') or @section('settings-content')
            // and contains <main ...> and </main>
            if (content.includes('@section(') && content.includes('<main') && content.includes('</main>')) {
                // Find the first <main ...> after @section
                // and the last </main> before @endsection
                // Wait, some files might just have exactly one <main> tag pair.
                // Let's count how many <main> tags are there.
                const mainTags = content.match(/<main/gi);
                const closeMainTags = content.match(/<\/main>/gi);
                
                if (mainTags && mainTags.length === 1 && closeMainTags && closeMainTags.length === 1) {
                    content = content.replace(/<main[^>]*>\s*/i, '');
                    content = content.replace(/\s*<\/main>\s*(?=@endsection)/i, '\n');
                    
                    fs.writeFileSync(fullPath, content, 'utf8');
                    console.log(`Removed <main> tag from ${fullPath}`);
                } else if (mainTags && mainTags.length > 1) {
                    console.log(`Skipping ${fullPath} because it has multiple <main> tags.`);
                }
            }
        }
    }
}

processDirectory(viewsDir);
