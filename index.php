<?php
session_start();
$page_title = "Your Mental Wellness Partner";
include 'includes/header.php';
?>

<style>
    /* ── HERO ── */
    .hero {
        min-height: 100vh;
        background: var(--navy);
        position: relative;
        display: flex; align-items: center;
        overflow: hidden;
        padding-top: 72px;
    }

    .hero::before {
        content: '';
        position: absolute; inset: 0;
        background: 
            radial-gradient(ellipse 60% 80% at 70% 50%, rgba(26,86,219,0.25) 0%, transparent 60%),
            radial-gradient(ellipse 40% 60% at 30% 80%, rgba(13,148,136,0.2) 0%, transparent 50%);
    }

    .hero-grid {
        display: grid; grid-template-columns: 1fr 1fr;
        gap: 60px; align-items: center;
        position: relative; z-index: 1;
        padding: 80px 0;
    }

    .hero-eyebrow {
        display: inline-flex; align-items: center; gap: 8px;
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.12);
        color: rgba(255,255,255,0.9);
        padding: 8px 16px; border-radius: 999px;
        font-size: 13px; font-weight: 600; margin-bottom: 24px;
    }

    .hero h1 {
        font-family: 'DM Serif Display', serif;
        font-size: 58px; line-height: 1.1;
        color: white; margin-bottom: 24px;
    }

    .hero h1 .accent { color: #60A5FA; font-style: italic; }

    .hero-desc {
        font-size: 18px; color: rgba(255,255,255,0.72);
        line-height: 1.7; margin-bottom: 36px; max-width: 480px;
    }

    .hero-actions { display: flex; gap: 14px; flex-wrap: wrap; }

    .hero-stats {
        display: flex; gap: 32px; margin-top: 48px;
        padding-top: 32px; border-top: 1px solid rgba(255,255,255,0.1);
    }

    .hero-stat .number {
        font-family: 'DM Serif Display', serif;
        font-size: 32px; color: white; line-height: 1;
    }
    .hero-stat .label { font-size: 13px; color: rgba(255,255,255,0.55); margin-top: 4px; }

    /* Hero visual panel */
    .hero-visual {
        display: flex; flex-direction: column; gap: 16px;
        position: relative; z-index: 1;
    }

    .hero-card {
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 20px;
        padding: 24px;
        backdrop-filter: blur(10px);
    }

    .therapist-mini {
        display: flex; align-items: center; gap: 14px;
    }

    .therapist-mini .avatar {
        width: 52px; height: 52px; border-radius: 14px;
        background: linear-gradient(135deg, var(--blue), var(--teal));
        display: flex; align-items: center; justify-content: center;
        color: white; font-size: 20px; font-weight: 700; flex-shrink: 0;
    }

    .therapist-mini .info .name { color: white; font-weight: 600; font-size: 15px; }
    .therapist-mini .info .spec { color: rgba(255,255,255,0.55); font-size: 13px; margin-top: 2px; }

    .stars { color: #FCD34D; font-size: 13px; margin-top: 6px; }

    .mood-row {
        display: flex; gap: 10px;
    }

    .mood-chip {
        flex: 1; text-align: center; padding: 14px 8px;
        border-radius: 14px; cursor: pointer;
        border: 1px solid rgba(255,255,255,0.08);
        background: rgba(255,255,255,0.04);
        transition: all 0.2s;
    }
    .mood-chip:hover { background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.2); }
    .mood-chip .emoji { font-size: 24px; display: block; }
    .mood-chip .label { color: rgba(255,255,255,0.55); font-size: 11px; margin-top: 4px; }

    /* ── TRUST BAR ── */
    .trust-bar {
        background: var(--white);
        border-bottom: 1px solid var(--border);
        padding: 20px 0;
    }

    .trust-items {
        display: flex; justify-content: center; align-items: center;
        gap: 48px; flex-wrap: wrap;
    }

    .trust-item {
        display: flex; align-items: center; gap: 10px;
        font-size: 14px; font-weight: 600; color: var(--text-muted);
    }

    .trust-item .icon { font-size: 20px; }

    /* ── HOW IT WORKS ── */
    .section { padding: 100px 0; }
    .section-alt { background: var(--white); }

    .section-header { text-align: center; margin-bottom: 64px; }
    .section-header h2 {
        font-family: 'DM Serif Display', serif;
        font-size: 42px; color: var(--navy); margin-bottom: 16px;
    }
    .section-header p { font-size: 18px; color: var(--text-muted); max-width: 560px; margin: 0 auto; }

    .steps-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 32px; }

    .step-card {
        text-align: center;
    }

    .step-icon {
        width: 72px; height: 72px; border-radius: 20px;
        background: linear-gradient(135deg, rgba(26,86,219,0.1), rgba(13,148,136,0.1));
        border: 1px solid rgba(26,86,219,0.15);
        display: flex; align-items: center; justify-content: center;
        font-size: 32px; margin: 0 auto 20px;
    }

    .step-num {
        width: 28px; height: 28px; border-radius: 50%;
        background: var(--blue); color: white;
        font-size: 13px; font-weight: 700;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 12px;
    }

    .step-card h3 { font-size: 18px; color: var(--navy); margin-bottom: 10px; font-weight: 700; }
    .step-card p { font-size: 14px; color: var(--text-muted); line-height: 1.6; }

    /* ── THERAPISTS PREVIEW ── */
    .therapist-cards { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }

    .t-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    .t-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-lg); border-color: rgba(26,86,219,0.2); }

    .t-card-header {
        background: linear-gradient(135deg, var(--navy), var(--navy-mid));
        padding: 28px; display: flex; align-items: center; gap: 16px;
    }

    .t-avatar {
        width: 64px; height: 64px; border-radius: 16px;
        background: linear-gradient(135deg, var(--blue-light), var(--teal-light));
        display: flex; align-items: center; justify-content: center;
        color: white; font-size: 24px; font-weight: 700;
        flex-shrink: 0;
    }

    .t-meta .name { color: white; font-size: 17px; font-weight: 700; }
    .t-meta .spec { color: rgba(255,255,255,0.65); font-size: 13px; margin-top: 3px; }
    .t-meta .rating { color: #FCD34D; font-size: 13px; margin-top: 6px; }

    .t-card-body { padding: 24px; }
    .t-card-body p { font-size: 14px; color: var(--text-muted); line-height: 1.6; margin-bottom: 16px; }

    .t-tags { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 20px; }
    .t-tag {
        font-size: 12px; padding: 4px 10px; border-radius: 6px;
        background: var(--surface-2); color: var(--text-muted); font-weight: 500;
    }

    .t-footer {
        display: flex; justify-content: space-between; align-items: center;
        padding: 16px 24px;
        border-top: 1px solid var(--border);
    }
    .t-fee { font-size: 15px; font-weight: 700; color: var(--navy); }
    .t-fee span { font-size: 12px; color: var(--text-muted); font-weight: 400; }

    /* ── TESTIMONIALS ── */
    .testimonials-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }

    .testimonial-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 28px;
    }

    .testimonial-card .quote {
        font-size: 15px; color: var(--text-muted); line-height: 1.7;
        font-style: italic; margin-bottom: 20px;
    }

    .testimonial-card .author {
        display: flex; align-items: center; gap: 12px;
    }

    .author-avatar {
        width: 44px; height: 44px; border-radius: 50%;
        background: linear-gradient(135deg, var(--blue), var(--teal));
        display: flex; align-items: center; justify-content: center;
        color: white; font-size: 16px; font-weight: 700;
    }

    .author-info .name { font-weight: 600; font-size: 14px; }
    .author-info .role { font-size: 12px; color: var(--text-muted); }

    /* ── CTA BANNER ── */
    .cta-banner {
        background: linear-gradient(135deg, var(--navy), #1A3260);
        border-radius: 28px;
        padding: 70px;
        text-align: center;
        position: relative; overflow: hidden;
        margin: 0 24px;
    }

    .cta-banner::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse 80% 80% at 50% 50%, rgba(26,86,219,0.3) 0%, transparent 70%);
    }

    .cta-banner * { position: relative; z-index: 1; }
    .cta-banner h2 {
        font-family: 'DM Serif Display', serif;
        font-size: 44px; color: white; margin-bottom: 16px;
    }
    .cta-banner p { font-size: 18px; color: rgba(255,255,255,0.72); margin-bottom: 36px; }
    .cta-actions { display: flex; gap: 14px; justify-content: center; }
</style>

<!-- HERO -->
<section class="hero">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content">
                <div class="hero-eyebrow">
                    ✦ Pakistan's #1 Mental Wellness Platform
                </div>
                <h1>
                    Heal Your Mind.<br>
                    Find Your <span class="accent">Peace.</span>
                </h1>
                <p class="hero-desc">
                    Connect with certified psychiatrists and psychologists from the comfort of your home. 
                    7-day clinical assessments, daily mood tracking, and personalized therapy — all in one secure place.
                </p>
                <div class="hero-actions">
                    <a href="signup.php" class="btn btn-primary btn-lg">Start Free Assessment</a>
                    <a href="therapists.php" class="btn btn-lg" style="background: rgba(255,255,255,0.1); color: white; border: 1px solid rgba(255,255,255,0.2);">Meet Our Therapists</a>
                </div>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <div class="number">2,400+</div>
                        <div class="label">Patients Helped</div>
                    </div>
                    <div class="hero-stat">
                        <div class="number">98%</div>
                        <div class="label">Satisfaction Rate</div>
                    </div>
                    <div class="hero-stat">
                        <div class="number">4</div>
                        <div class="label">Certified Experts</div>
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <div class="hero-card">
                    <div style="font-size: 12px; font-weight: 600; color: rgba(255,255,255,0.5); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 16px;">Today's Featured Therapist</div>
                    <div class="therapist-mini">
                        <div class="avatar">A</div>
                        <div class="info">
                            <div class="name">Dr. Ayesha Malik</div>
                            <div class="spec">Clinical Psychologist · CBT Expert</div>
                            <div class="stars">★★★★★ <span style="color: rgba(255,255,255,0.5);">4.9 (247 reviews)</span></div>
                        </div>
                    </div>
                    <div style="margin-top: 16px; padding-top: 16px; border-top: 1px solid rgba(255,255,255,0.1); display: flex; justify-content: space-between; align-items: center;">
                        <span style="color: rgba(255,255,255,0.55); font-size: 13px;">Next slot: Today 3:00 PM</span>
                        <a href="signup.php" class="btn btn-teal" style="padding: 8px 16px; font-size: 13px;">Book Session</a>
                    </div>
                </div>

                <div class="hero-card">
                    <div style="font-size: 12px; font-weight: 600; color: rgba(255,255,255,0.5); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 14px;">How are you feeling right now?</div>
                    <div class="mood-row">
                        <div class="mood-chip">
                            <span class="emoji">😊</span>
                            <span class="label">Happy</span>
                        </div>
                        <div class="mood-chip">
                            <span class="emoji">😔</span>
                            <span class="label">Sad</span>
                        </div>
                        <div class="mood-chip">
                            <span class="emoji">😰</span>
                            <span class="label">Anxious</span>
                        </div>
                        <div class="mood-chip">
                            <span class="emoji">😴</span>
                            <span class="label">Tired</span>
                        </div>
                        <div class="mood-chip">
                            <span class="emoji">😌</span>
                            <span class="label">Calm</span>
                        </div>
                    </div>
                </div>

                <div class="hero-card" style="background: rgba(13,148,136,0.15); border-color: rgba(13,148,136,0.3);">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <span style="font-size: 28px;">🛡️</span>
                        <div>
                            <div style="color: white; font-weight: 600; font-size: 14px;">100% Confidential & Secure</div>
                            <div style="color: rgba(255,255,255,0.55); font-size: 13px; margin-top: 3px;">All sessions and data are encrypted end-to-end</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TRUST BAR -->
<div class="trust-bar">
    <div class="container">
        <div class="trust-items">
            <div class="trust-item"><span class="icon">🏥</span> PPMC Certified Doctors</div>
            <div class="trust-item"><span class="icon">🔒</span> End-to-End Encrypted</div>
            <div class="trust-item"><span class="icon">📋</span> BDI-II Clinical Assessment</div>
            <div class="trust-item"><span class="icon">🌐</span> Available 7 Days a Week</div>
            <div class="trust-item"><span class="icon">🇵🇰</span> Based in Pakistan</div>
        </div>
    </div>
</div>

<!-- HOW IT WORKS -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">✦ Simple Process</span>
            <h2>Your Wellness Journey in 4 Steps</h2>
            <p>Getting started takes less than 5 minutes. No waiting rooms, no paperwork.</p>
        </div>
        <div class="steps-grid">
            <div class="step-card">
                <div class="step-num">1</div>
                <div class="step-icon">📝</div>
                <h3>Create Account</h3>
                <p>Sign up securely in under 2 minutes. Your data is protected with bank-grade encryption.</p>
            </div>
            <div class="step-card">
                <div class="step-num">2</div>
                <div class="step-icon">📊</div>
                <h3>Take Assessment</h3>
                <p>Complete a clinically validated 10-question daily assessment to map your emotional state.</p>
            </div>
            <div class="step-card">
                <div class="step-num">3</div>
                <div class="step-icon">👨‍⚕️</div>
                <h3>Match & Book</h3>
                <p>Browse certified therapists matched to your needs and book a session that fits your schedule.</p>
            </div>
            <div class="step-card">
                <div class="step-num">4</div>
                <div class="step-icon">💚</div>
                <h3>Start Healing</h3>
                <p>Track your 7-day progress, attend sessions, and watch your mental wellness transform.</p>
            </div>
        </div>
    </div>
</section>

<!-- THERAPISTS PREVIEW -->
<section class="section section-alt">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">✦ Our Team</span>
            <h2>Meet Our Certified Experts</h2>
            <p>Every therapist on MindSpace is fully licensed, PPMC-certified, and rigorously vetted.</p>
        </div>

        <?php
        include 'includes/db.php';
        $res = mysqli_query($conn, "SELECT * FROM therapists LIMIT 3");
        if (mysqli_num_rows($res) > 0):
        ?>
        <div class="therapist-cards">
            <?php while($t = mysqli_fetch_assoc($res)): 
                $initial = strtoupper(substr($t['name'], 3, 1));
                $avail_class = $t['availability'] === 'available' ? 'badge-green' : 'badge-warning';
                $avail_text = $t['availability'] === 'available' ? '● Available' : '◐ Busy';
            ?>
            <div class="t-card">
                <div class="t-card-header">
                    <div class="t-avatar"><?= $initial ?></div>
                    <div class="t-meta">
                        <div class="name"><?= htmlspecialchars($t['name']) ?></div>
                        <div class="spec"><?= htmlspecialchars($t['credentials']) ?></div>
                        <div class="rating">★★★★★ <?= $t['rating'] ?> (<?= $t['total_reviews'] ?>)</div>
                    </div>
                </div>
                <div class="t-card-body">
                    <p><?= htmlspecialchars(substr($t['bio'], 0, 120)) ?>...</p>
                    <div class="t-tags">
                        <span class="t-tag"><?= $t['experience_years'] ?> years exp.</span>
                        <span class="badge <?= $avail_class ?>"><?= $avail_text ?></span>
                    </div>
                </div>
                <div class="t-footer">
                    <div class="t-fee">PKR <?= number_format($t['session_fee']) ?> <span>/ session</span></div>
                    <a href="signup.php" class="btn btn-primary" style="padding: 9px 18px; font-size: 13px;">Book Now</a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php else: ?>
        <p class="text-center text-muted">Therapists loading... Please set up the database first.</p>
        <?php endif; ?>

        <div class="text-center" style="margin-top: 40px;">
            <a href="therapists.php" class="btn btn-outline btn-lg">View All Therapists →</a>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">✦ Patient Stories</span>
            <h2>Lives Transformed</h2>
            <p>Real stories from real patients who found their peace through MindSpace.</p>
        </div>

        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="stars" style="margin-bottom: 16px; color: #F59E0B;">★★★★★</div>
                <p class="quote">"After my mother's passing, I couldn't function. Dr. Ayesha's CBT sessions gave me tools to process grief. Within 3 months, I was myself again."</p>
                <div class="author">
                    <div class="author-avatar">F</div>
                    <div class="author-info">
                        <div class="name">Fatima R.</div>
                        <div class="role">Teacher, Lahore</div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="stars" style="margin-bottom: 16px; color: #F59E0B;">★★★★★</div>
                <p class="quote">"Severe anxiety had paralyzed my career. The 7-day assessment helped me understand my patterns. Now I give presentations without panic attacks."</p>
                <div class="author">
                    <div class="author-avatar">A</div>
                    <div class="author-info">
                        <div class="name">Ahmed K.</div>
                        <div class="role">Software Engineer, Karachi</div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="stars" style="margin-bottom: 16px; color: #F59E0B;">★★★★★</div>
                <p class="quote">"As a student struggling with depression, I found MindSpace incredibly accessible and affordable. Dr. Bilal truly understood what I was going through."</p>
                <div class="author">
                    <div class="author-avatar">Z</div>
                    <div class="author-info">
                        <div class="name">Zara M.</div>
                        <div class="role">Student, Islamabad</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section" style="padding-top: 0;">
    <div class="container">
        <div class="cta-banner">
            <h2>Your Journey to Wellness Starts Today</h2>
            <p>Join thousands of Pakistanis already improving their mental health with MindSpace.</p>
            <div class="cta-actions">
                <a href="signup.php" class="btn btn-primary btn-lg">Create Free Account</a>
                <a href="contact.php" class="btn btn-lg" style="background: rgba(255,255,255,0.1); color: white; border: 1px solid rgba(255,255,255,0.2);">Talk to Us First</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>