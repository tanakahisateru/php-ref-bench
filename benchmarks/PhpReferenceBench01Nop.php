<?php
namespace Acme;

use PhpBench\Benchmark\Metadata\Annotations\BeforeMethods;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;
use PhpBench\Benchmark\Metadata\Annotations\Warmup;

/**
 * @BeforeMethods({"init"})
 */
class PhpReferenceBench01Nop
{
    protected $bigArray;

    public function init()
    {
        $this->bigArray = range(1, 100000);
    }

    /**
     * @Warmup(10)
     * @Revs(100)
     * @Iterations(10)
     */
    public function benchNoRef()
    {
        $result = PhpReference::nopNoRef($this->bigArray);
        unset($result);
    }

    /**
     * @Warmup(10)
     * @Revs(100)
     * @Iterations(5)
     */
    public function benchRefArg()
    {
        $result = PhpReference::nopRefArg($this->bigArray);
        unset($result);
    }

    /**
     * @Warmup(10)
     * @Revs(100)
     * @Iterations(5)
     */
    public function benchRefBoth()
    {
        $result = PhpReference::nopRefBoth($this->bigArray);
        unset($result);
    }
}
