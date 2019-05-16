<?php

namespace Yajra\DataTables\Html\Options;

/**
 * DataTables - Internationalisation option builder.
 *
 * @see https://datatables.net/reference/option/
 */
trait HasInternationalisation
{
    /**
     * Set language option value.
     *
     * @param string|array $value
     * @return $this
     * @see https://datatables.net/reference/option/language
     */
    public function language($value)
    {
        if (is_array($value)) {
            $this->attributes['language'] = $value;
        } else {
            $this->attributes['language']['url'] = $value;
        }

        return $this;
    }
}
