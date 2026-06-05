const fs = require('fs');
const path = require('path');

const viewsDir = "/Users/macbookpro2020/Work/E-Lancer/Course Project TODO's/resources/views";
const templatesDir = "/Users/macbookpro2020/Work/E-Lancer/sass_blog_html_templates";

const map = {
    "dashboard/post-analytics.blade.php": "post_analytics_detailed_view",
    "public/search-results.blade.php": "search_results",
    "public/category-hub.blade.php": "category_hub_design",
    "public/design-system.blade.php": "the_design_system",
    "public/complete-subscription.blade.php": "complete_subscription",
    "dashboard/collaboration.blade.php": "collaboration_dashboard",
    "dashboard/edit-article.blade.php": "edit_article_the_architecture_of_silence",
    "public/pricing.blade.php": "pricing_plans",
    "public/author-profile.blade.php": "author_profile",
    "public/author-profile-julian.blade.php": "author_profile_julian_vane",
    "public/tag-archive.blade.php": "tag_archive_minimalism",
    "dashboard/writing-editor.blade.php": "writing_editor",
    "dashboard/earnings.blade.php": "earnings_payouts",
    "dashboard/drafts.blade.php": "dashboard_drafts",
    "social/following.blade.php": "following_list",
    "management/categories.blade.php": "manage_categories",
    "social/followers.blade.php": "followers_list",
    "management/create-category.blade.php": "create_new_category",
    "management/content.blade.php": "manage_content",
    "management/member-sarah.blade.php": "manage_member_sarah_chen",
    "management/tags.blade.php": "manage_tags",
    "management/invite.blade.php": "invite_new_member",
    "management/create-tag.blade.php": "create_new_tag",
    "management/edit-category.blade.php": "edit_category_technology",
    "settings/profile.blade.php": "profile_settings",
    "settings/security.blade.php": "security_settings",
    "settings/notifications.blade.php": "notification_settings",
    "settings/account.blade.php": "account_settings",
    "auth/reset-password.blade.php": "reset_password",
    "auth/forgot-password.blade.php": "forgot_password",
    "management/members.blade.php": "manage_members",
    "public/subscription.blade.php": "subscription",
    "dashboard/analytics.blade.php": "author_dashboard_analytics",
    "public/article.blade.php": "article_view",
    "public/feed.blade.php": "feed_home"
};

const placeholderText = "This page is under construction. Full template coming soon.";

for (const [bladeFile, templateFolder] of Object.entries(map)) {
    const bladePath = path.join(viewsDir, bladeFile);
    if (!fs.existsSync(bladePath)) continue;

    let bladeContent = fs.readFileSync(bladePath, 'utf8');
    if (!bladeContent.includes(placeholderText)) {
        continue;
    }

    const htmlPath = path.join(templatesDir, templateFolder, 'code.html');
    if (!fs.existsSync(htmlPath)) {
        console.log(`Template not found for ${bladeFile}: ${htmlPath}`);
        continue;
    }

    const htmlContent = fs.readFileSync(htmlPath, 'utf8');

    let mainMatch = htmlContent.match(/<main[\s\S]*?<\/main>/i);
    if (!mainMatch) {
        // Fallback: search for <div class="min-h-screen..."> or <div class="pt-24..."> which some templates use if there's no main
        // Try looking for the first direct child of body that contains the main content.
        // Actually, let's just grab the content inside <body...> </body>, excluding <header> and <footer>
        let bodyMatch = htmlContent.match(/<body[^>]*>([\s\S]*?)<\/body>/i);
        if (bodyMatch) {
            let bodyContent = bodyMatch[1];
            bodyContent = bodyContent.replace(/<header[\s\S]*?<\/header>/gi, '');
            bodyContent = bodyContent.replace(/<nav[\s\S]*?<\/nav>/gi, '');
            bodyContent = bodyContent.replace(/<footer[\s\S]*?<\/footer>/gi, '');
            mainMatch = [bodyContent.trim()];
        } else {
            console.log(`No <main> tag or <body> found in template for ${bladeFile}`);
            continue;
        }
    }

    const mainTagContent = mainMatch[0];

    const sectionRegex = /(@section\('page-content'\))([\s\S]*?)(@endsection)/i;
    
    if (sectionRegex.test(bladeContent)) {
        const newBladeContent = bladeContent.replace(sectionRegex, `$1\n${mainTagContent}\n$3`);
        fs.writeFileSync(bladePath, newBladeContent, 'utf8');
        console.log(`Updated ${bladeFile}`);
    } else {
        console.log(`Could not find @section('page-content') in ${bladeFile}`);
    }
}
