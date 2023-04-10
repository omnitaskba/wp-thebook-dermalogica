<?php

$accordions = array();
$skin_condition = '';
$bioactivity_score = '';

//
if (get_field('pim_how_to_use') != '') {
    $accordions[2] = array('How to Use', get_field('pim_how_to_use'));
}

//
if (have_rows('pim_benefits')) {
    $benefitsNew = '';
    while (have_rows('pim_benefits')) {
        the_row();
        $benefitsNew .= '<li>' . get_sub_field('pim_benefit') . '</li>';
    }
    $accordions[1] = array('Benefits', $benefitsNew);
}

//
if (have_rows('pim_attributes')) {
    $i = 0;
    while (have_rows('pim_attributes')) {
        the_row();
        $i++;

        $pim_attribute_name = get_sub_field('pim_attribute_name');
        $pim_attribute_description = get_sub_field('pim_attribute_description');

        if ($pim_attribute_name != '' && $pim_attribute_description != '' && $pim_attribute_description != 'null') {

            if ($pim_attribute_name == 'Skin Condition') {
                $skin_condition = $pim_attribute_description;
            } else if ($pim_attribute_name == 'Bioactivity') {
                $bioactivity_score = $pim_attribute_description;
            } else if ($pim_attribute_name == 'Quick Tip') {
                $accordions[8] = array('Quick Tip', $pim_attribute_description);
            } else if ($pim_attribute_name == 'Bioactivity score') {
                $accordions[10] = array('Bioactivity score', $pim_attribute_description);
            }
        }
    }

}

//
if (have_rows('pim_compatible_modalities')) {
    $compatibleModalities = '';
    while (have_rows('pim_compatible_modalities')) {
        the_row();
        $i++;
        $compatibleModalities .= '<p>' . get_sub_field('pim_modality') . '</p>';
    }
    $accordions[9] = array('Compatible Modalities', $compatibleModalities);
}

//
if (have_rows('pim_disclaimers')) {
    var_dump("PIM disclaimers");
    $pim_disclaimers = '';
    while (have_rows('pim_disclaimers')) {
        the_row();
        $value = get_sub_field('pim_disclaimer');
        $type = get_sub_field('pim_wc_type');

        $title = '';
        if ($type != 'default') {
            $title = '<strong class="bold">' . $type . '</strong><br/>';
        }

        $pim_disclaimers .= '<p>' . $title . $value . '</p>';
    }
    $accordions[12] = array('Warnings and Contraindications', $pim_disclaimers);
    var_dump($accordions[12]);
}

//
if (have_rows('pim_ingredients')) {

    $pim_ingredients = '';
    while (have_rows('pim_ingredients')) {
        the_row();
        $value = get_sub_field('pim_ingredient_section_content');
        $type = get_sub_field('pim_ingridients_type');

        $title = '';
        if ($type != 'default') {
            $title = '<strong class="bold">' . $type . '</strong><br/>';
        }

        $pim_ingredients .= '<p>' . $title . $value . '</p>';
    }
    $accordions[13] = array('Ingredients', $pim_ingredients);
}

//
if (have_rows('pim_key_ingredients')) {
    if (is_user_logged_in()) {
        $keyIngredientsNew = '<ul>';
        while (have_rows('pim_key_ingredients')) {
            the_row();
            $value = get_sub_field('pim_key_ingredient');
            $keyIngredientsNew .= '<li>' . $value . '</li>';
        }
        $keyIngredientsNew .= '</ul>';
    } else {
        $keyIngredientsNew = lockedContent('Key ingredients');
    }
    $accordions[14] = array('Key ingredients', $keyIngredientsNew);
}

//
if (have_rows('pim_professional_application')) {
    $applicationsNew = '';
    $an = array();
    $i = 0;
    while (have_rows('pim_professional_application')) {
        the_row();
        $i++;
        $pim_professional_application_order = get_sub_field('pim_professional_application_order');
        $pim_professional_application_description = get_sub_field('pim_professional_application_description');
        $pim_professional_application_is_optional = get_sub_field('pim_professional_application_is_optional');
        $pim_professional_application_optional_text = get_sub_field('pim_professional_application_optional_text');
        $an[] = array('order' => $pim_professional_application_order, 'description' => $pim_professional_application_description, 'optional' => $pim_professional_application_is_optional, 'optionalText' => $pim_professional_application_optional_text);
    }

    if (count($an) > 0) {
        ksort($an);
        $i = 0;
        foreach ($an as $item) {
            $i++;
            $applicationsNew .= '<div class="orderItem"><span class="num">' . $i . '</span>' . $item['description'] . ($item['optional'] ? '<div class="mb-4 pl-4">' . $item['optionalText'] . '<br/><br/></div>' : '') . '</div>';
        }
    }

    $accordions[15] = array('Professional Application', $applicationsNew);
}

//
//
if (count($accordions) > 0) {
    ksort($accordions);

    ?>
<div class="accordions">
    <?php
foreach ($accordions as $accrodion) {
        echo '
                <div class="item">
                    <a href="#" class="title">
                        <span>' . $accrodion[0] . '</span>
                        <div>
                            <i class="icon-plus"></i>
                            <i class="icon-minus"></i>
                        </div>
                    </a>
                    <div class="content">' . $accrodion[1] . '</div>
                </div>
            ';
    }
    ?>
</div>
<?php }?>