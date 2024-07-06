<?php
use function CatPaw\Core\anyError;
use CatPaw\Core\CommandBuilder;
use CatPaw\Core\CommandContext;
use function CatPaw\Core\error;
use CatPaw\Core\Interfaces\CommandInterface;
use CatPaw\Core\Interfaces\CommandRunnerInterface;
use function CatPaw\Core\ok;
use CatPaw\Core\Unsafe;
use CatPaw\Screen\Interfaces\ScreenInterface;

class ScreenshotCommand implements CommandRunnerInterface {
    public function __construct(private ScreenInterface $screen) {
    }

    public function build(CommandBuilder $builder): Unsafe {
        $builder->withOption('o', 'output', error('Please provide an output file name using `-o` or `--output` options.'));
        return ok();
    }
    public function run(CommandContext $context): Unsafe {
        return anyError(function() use ($context) {
            $fileName = $context->get('o')->try();
            $this->screen->capture($fileName);
            return ok();
        });
    }
}

/**
 * 
 * @param  CommandInterface $command
 * @param  ScreenInterface  $screen
 * @return Unsafe<bool>
 */
function main(CommandInterface $command, ScreenInterface $screen):Unsafe {
    return anyError(fn () => match (true) {
        $command->register(new ScreenshotCommand($screen))->try() => ok(),
        default                                                   => print(
            <<<TEXT
                -o, --output    Set the name of the output (png) file.
                TEXT
        )
    });
}