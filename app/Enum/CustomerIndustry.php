<?php

namespace App\Enum;

enum CustomerIndustry: string
{
    case AUTOMOTIVE = 'automotive';
    case BANKING_FINANCE = 'banking_finance';
    case CONSTRUCTION = 'construction';
    case CONSULTING = 'consulting';
    case E_COMMERCE = 'e_commerce';
    case EDUCATION = 'education';
    case ENERGY_UTILITIES = 'energy_utilities';
    case ENTERTAINMENT_MEDIA = 'entertainment_media';
    case FOOD_BEVERAGE = 'food_beverage';
    case GOVERNMENT = 'government';
    case HEALTHCARE = 'healthcare';
    case HOSPITALITY_TOURISM = 'hospitality_tourism';
    case INSURANCE = 'insurance';
    case IT_SOFTWARE = 'it_software';
    case LEGAL_SERVICES = 'legal_services';
    case MANUFACTURING = 'manufacturing';
    case MARKETING_ADVERTISING = 'marketing_advertising';
    case NON_PROFIT_NGOS = 'non_profit_ngos';
    case PHARMACEUTICALS = 'pharmaceuticals';
    case REAL_ESTATE = 'real_estate';
    case RETAIL = 'retail';
    case TELECOMMUNICATIONS = 'telecommunications';
    case TRANSPORTATION_LOGISTICS = 'transportation_logistics';
    case WHOLESALE_DISTRIBUTION = 'wholesale_distribution';
}
