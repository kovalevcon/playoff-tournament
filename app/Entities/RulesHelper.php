<?php
declare(strict_types=1);
namespace App\Entities;

/**
 * Trait RulesHelper
 *
 * @package App\Entities
 */
trait RulesHelper
{
    /**
     * Get rules for model attributes
     *
     * @return array
     */
    abstract public function rules(): array;

    /**
     * Get rule by key
     *
     * @param string $key
     * @return string
     */
    public static function getRule(string $key): string
    {
        return (new self)->rules()[$key] ?? '';
    }
}
